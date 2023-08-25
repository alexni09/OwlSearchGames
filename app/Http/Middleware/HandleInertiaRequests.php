<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

/* Language Support */
use Illuminate\Support\Facades\App;
use App\UserClasses\BaseLanguage;

/* for queries */
use App\Models\Pronoun;
use App\Models\Locale;
use App\Models\Permission;

/* for the user_id */
use App\Models\User;

/* for the score */
use App\Models\Score;

/* for the background image */
use App\Models\Background;

/* for the Light Bulb component */
use App\UserClasses\Misc;
use Carbon\Carbon;

class HandleInertiaRequests extends Middleware {
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array {
        /* user &c. */
        $user = $request->user();

        /* Language Support */
        $dl = $user !== null ? Locale::getLocaleFromLocale($user['locale_id']) : BaseLanguage::getDefaultLanguage();
        App::setlocale(session('locale', $dl));
        $mustUpdateLocale = session('mustUpdateLocale', false);  /* True after login. */
        session(['mustUpdateLocale' => false]);

        /* Score */
        $score = null;
        if ($user !== null) $score = Score::getTotalScore($user[User::MAIN_FIELD]);

        /* Dynamic Background Style */
        $img = session('backgroundImage', null);
        $backgroundPosition = session('backgroundPosition', null);
        if (!isset($img) || !isset($backgroundPosition)) {
            $record = Background::fetchRandom();
            $img = Background::IMAGE_DIR . $record->img;
            $backgroundPosition = $record->background_position;
            session([
                'backgroundImage' => $img,
                'backgroundPosition' => $backgroundPosition
            ]);
        }

        /* Idea Feeder */
        $feederOperation = null;
        if ($user === null) {
            if (!session('isMessageLoginRegisterDisplayed', false)) $feederOperation = 1;
        } else {
            if (session('gainedPremiumPromo', false) && !session('isMessagePremiumPromoDisplayed', false)) $feederOperation = 3;
            else if (session('gainedPremium', false) && !session('isMessagePremiumDisplayed', false)) $feederOperation = 4;
            else if (session('gainedAdvanced', false) && !session('isMessageAdvancedDisplayed', false)) $feederOperation = 2;
            else if (session('becameDonor', false) && !session('isMessageBecameDonorDisplayed', false)) $feederOperation = 5;
            else {
                $datePremium = session('datePremium', null);
                if ($score >= Score::POINTS_ADVANCED 
                    && $score < Score::POINTS_PREMIUM
                    && ($datePremium === null || Carbon::now()->gt($datePremium))
                    && !$user->hasPermission('main.difficulty.insane'))
                {
                    Misc::meetsPromoPremiumCriteria() ? $feederOperation = 7 : $feederOperation = 8;
                } else {
                    $dateAdvanced = session('dateAdvanced', null);
                    if ($score < Score::POINTS_ADVANCED
                    && ($dateAdvanced === null || Carbon::now()->gt($dateAdvanced))
                    && !$user->hasPermission('main.difficulty.verydifficult'))
                    {
                        $feederOperation = 6;
                    }
                }
            }
        }

        /* Main logic */
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $user !== null ? 
                    $user->only([User::MAIN_FIELD,'name','email','show_pronoun','show_user_id','show_name','show_email','locale_id','pronoun_id','country_id']) : null,
                'pronoun' => $user !== null ? Pronoun::getPronounFromPronoun($user['pronoun_id']) : null,
                'sex' => $user !== null ? Pronoun::getSexFromPronoun($user['pronoun_id']) : null,
                'locale' => $dl,  /* preferred locale, from the user table */
                'permissions' => $user !== null ? Permission::permissionsFromUser($user->id) : null
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'locale' => session('locale', $dl),  /* current locale */
            'mustUpdateLocale' => $mustUpdateLocale,  /* iff true, the component MustUpdateLocale sets the locale globally. */
            'accumulatedScore' => $score,
            'background' => [
                'img' => $img,
                'position' => $backgroundPosition
            ],
            'pointsAdvanced' => Score::POINTS_ADVANCED,
            'pointsPremium' => Score::POINTS_PREMIUM,
            'minimumOperation' => Misc::MIN_IDEA_OPERATION,
            'maximumOperation' => Misc::MAX_IDEA_OPERATION,
            'feederOperation' => $feederOperation
        ]);
    }
}