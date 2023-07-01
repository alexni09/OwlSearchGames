<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use App\UserClasses\WordSearchGame;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Access\AuthorizationException;
use App\Models\Score;
use App\Models\User;
use App\Models\Role;
use App\UserClasses\Misc;

class GameController extends Controller {
    public function create(Request $request): Response {
        $validated = $request->validate([
            'directions' => ['required', 'boolean'],
            'difficultyLevel' => ['required', 'integer', 'min:0', 'max:4'],
            'x' => ['required', 'integer', 'min:10', 'max:25'],
            'y' => ['required', 'integer', 'min:8', 'max:18'],
            'count' => ['required', 'integer', 'min:10', 'max:28'],
            'worddiff' => ['nullable', 'boolean'],
            'difficulty' => ['required', 'integer']
        ]);
        if (!$request->user() && $validated['difficultyLevel'] >= 3) throw new AuthorizationException;
        elseif ($request->user() && $validated['difficultyLevel'] === 4) $this->authorize('main.difficulty.insane');
        elseif ($request->user() && $validated['difficultyLevel'] === 3) $this->authorize('main.difficulty.verydifficult');
        $wsg = new WordSearchGame($validated['x'], $validated['y'], $validated['count'], $validated['worddiff'], $validated['directions']);
        $score_id = null;
        if ($request->user()) {
            $score = Score::create([
                User::MAIN_FIELD => $request->user()->user_id,
                'difficultyLevel' => $validated['difficultyLevel'],
                'difficulty' => $validated['difficulty']
            ]);
            $score_id = $score->id;
        }
        sleep(2);
        return Inertia::render('Game/CreateGame', [
            'wordSearchGame' => $wsg->getAll(),
            'score_id' => $score_id,
            'difficultyLevel' => $validated['difficultyLevel']
        ]);
    }

    public function reload(): RedirectResponse {
        return Redirect::to(RouteServiceProvider::HOME);
    }

    public function show(Request $request): Response {
        return Inertia::render('Game/MainPage');
    }

    public function update(Request $request): RedirectResponse {
        if ($request->user()) {
            $validated = $request->validate([
                'score_id' => ['required', 'integer', 'exists:scores,id'],
                'gameScore' => ['required', 'integer', 'min:0']
            ]);
            $score = Score::find($validated['score_id']);
            if ($score->user_id !== $request->user()->user_id) throw new AuthorizationException;
            if ($score->score !== null) throw new AuthorizationException;
            $oldScore = Score::getTotalScore($request->user()->user_id);
            $newScore = $validated['gameScore'] + Score::getEffectiveScore($score->difficulty);
            if      ($oldScore < Score::POINTS_PREMIUM 
                    && $oldScore + $newScore >= Score::POINTS_PREMIUM
                    && Misc::meetsPromoPremiumCriteria()
                    && !$request->user()->hasPermission('trophy.gold'))
            {
                    $request->user()->roles()->attach(Role::where('name','user.premium.promo')->value('id'));
                    session(['gainedPremiumPromo' => true, 'isMessagePremiumPromoDisplayed' => false]);
            } else  if ($oldScore < Score::POINTS_PREMIUM 
                    && $oldScore + $newScore >= Score::POINTS_PREMIUM 
                    && !$request->user()->hasPermission('trophy.gold')) 
            {
                    $request->user()->roles()->attach(Role::where('name','user.premium')->value('id'));
                    session(['gainedPremium' => true, 'isMessagePremiumDisplayed' => false]);
            } else  if ($oldScore < Score::POINTS_ADVANCED 
                    && $oldScore + $newScore >= Score::POINTS_ADVANCED 
                    && !$request->user()->hasPermission('trophy.silver')) 
            {
                    $request->user()->roles()->attach(Role::where('name','user.advanced')->value('id'));
                    session(['gainedAdvanced' => true, 'isMessageAdvancedDisplayed' => false]);
            }
            $score->score = $newScore;
            $score->save();
            $request->session()->pull('backgroundImage', null);
            $request->session()->pull('backgroundPosition', null);
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}