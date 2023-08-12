<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Locale;
use App\Models\Pronoun;
use App\Rules\UserIdMain;
use App\Rules\UserIdFirstCharacter;
use App\Rules\UserIdLastCharacter;
use App\Rules\EmailBanned;
use App\Rules\UserIdBanned;
use App\Models\Role;
//use Symfony\Component\Mailer\Exception\TransportException;
use App\Jobs\SendEmailVerification;
use App\Jobs\SendRegisteredUserNotificationToAdmins;

class RegisteredUserController extends Controller {
    /**
     * Display the registration view.
     */
    public function create(): Response {
        $locales = Locale::selectIdLocaleNameIfActive();
        $pronouns = Pronoun::selectIdLocalePronoun();
        return Inertia::render('Auth/RegisterNewUser', [
            'locales' => $locales,
            'pronouns' => $pronouns
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse|Response {
        $request->validate([
            User::MAIN_FIELD => ['required', 'string', 'min:'.User::MAIN_FIELD_MIN_CHARS, 'max:'.User::MAIN_FIELD_MAX_CHARS, 
                                new UserIdBanned, new UserIdFirstCharacter, new UserIdMain, new UserIdLastCharacter, 'unique:user_ids'],
            User::PASSWORD_FIELD => ['required', 'confirmed', Password::defaults()],
            'password_confirmation' => ['required', Password::defaults()],
            'name' => ['required', 'string', 'max:'.User::NAME_FIELD_MAX_CHARS],
            'email' => ['required', 'string', 'email', 'max:'.User::EMAIL_FIELD_MAX_CHARS, new EmailBanned, 'unique:'.User::class],
            'locale_id' => ['required', 'exists:locales,id'],
            'pronoun_id' => ['required', 'exists:pronouns,id'],
            'show_pronoun' => ['required', 'boolean'],
            'show_name' => ['required', 'boolean'],
            'show_email' => ['required', 'boolean'],
            'show_user_id' => ['required', 'boolean'],
            'captcha' => ['required', 'min:6', 'max:6', 'captcha']
        ]);
        $user = User::create([
            User::MAIN_FIELD => $request->user_id,
            User::PASSWORD_FIELD => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'locale_id' => $request->locale_id,
            'pronoun_id' => $request->pronoun_id,
            'show_pronoun' => $request->show_pronoun,
            'show_name' => $request->show_name,
            'show_email' => $request->show_email,
            'show_user_id' => $request->show_user_id
        ]);
        $user->roles()->attach(Role::where('name','user.generic')->value('id'));
        /*
        try {
            event(new Registered($user));
        } catch(TransportException) {
            $user->delete();
            return Inertia::render('Auth/EmailNotSent');
        }
        */
        event(new Registered($user));
        SendEmailVerification::dispatch($user);
        SendRegisteredUserNotificationToAdmins::dispatch($user);
        Auth::login($user);
        $user_locale = Locale::getLocaleFromUserId($request[User::MAIN_FIELD]);
        session(['locale' => $user_locale, 'mustUpdateLocale' => true]);
        return redirect(RouteServiceProvider::HOME);
    }
}