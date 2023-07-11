<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\PasswordToken;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use App\Models\Locale;
use Illuminate\Support\Facades\App;
use App\Events\PasswordExpired;
use Illuminate\Support\Facades\Redirect;
use App\Models\OldPassword;
use Symfony\Component\Mailer\Exception\TransportException;

class PasswordExpiredController extends Controller {
    /**
     * Processes and incoming expired password reset request with hash.
     */
    public function show(Request $request): Response|RedirectResponse {
        if (!$request->hash) throw new AuthorizationException('No token.',403);
        if (!$request->pw) throw new AuthorizationException('No token.',403);
        $id = intval($request->id);
        try {
            $token = PasswordToken::find($id);
        } catch (QueryException $qe) {
            throw new AuthorizationException('Undefined Error.',403);
        }
        if ($token === null) throw new AuthorizationException('No token.',403);
        if ($token->token !== $request->hash) throw new AuthorizationException('Wrong token.',403);
        if ($token->is_used) throw new AuthorizationException('Token already used.',403);
        $dt = $token->created_at->addMinutes(PasswordToken::MINUTES);
        if ($dt->lte(Carbon::now())) {
            if (User::getStatusFromUserId($token->user_id) !== User::STATUS_FIELD_PASSWORD_EXPIRED)
                throw new AuthorizationException('Token has expired.',403);
            $locale = Locale::getLocaleFromUserId($token->user_id);
            App::setlocale($locale);
            session(['locale' => $locale, 'mustUpdateLocale' => true]);
            /* This one is different: there is no user logged in. */
            Inertia::share('mustUpdateLocale', false);
            return Inertia::render('Auth/SendPasswordExpiredToken', [
                'token' => $token->token,
                'locale' => $locale 
            ]);
        }
        if (!Auth::attempt([User::MAIN_FIELD => $token->user_id, User::PASSWORD_FIELD => $request->pw])) throw new AuthorizationException('Unauthorized.',403);
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Shows the form for updating the user's expired password.
     */
    public function edit(Request $request): Response {
        $locale = Locale::getLocaleFromUserId($request->user()->user_id);
        App::setlocale($locale);
        session(['locale' => $locale, 'mustUpdateLocale' => true]);
        Inertia::share('locale', $locale);
        Inertia::share('mustUpdateLocale', true);
        return Inertia::render('Auth/UpdateExpiredPassword');
    }

    /**
     * Updates the user's expired password.
     */
    public function update(Request $request): RedirectResponse {
        $validated = $request->validate([
            'new_password' => ['required', Password::defaults(), 'confirmed'],
            'new_password_confirmation' => ['required', Password::defaults()]
        ]);
        $request->user()->update([
            'password' => Hash::make($validated['new_password']),
            'status' => User::STATUS_FIELD_ACTIVE
        ]);
        PasswordToken::setUsed($request->user()->user_id);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Sends another email with a notification for setting the expired password.
     */
    public function resend(Request $request): RedirectResponse|Response {
        if (!PasswordToken::existsToken($request->token)) return redirect()->intended(RouteServiceProvider::HOME);
        $user_id = PasswordToken::getUserIdByToken($request->token);
        $user = User::where('user_id',$user_id)->get()[0];
        try {
            event(new PasswordExpired($user));
        } catch(TransportException) {
            return Inertia::render('Auth/EmailNotSent');
        }
        /* Logout and go HOME. */
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to(RouteServiceProvider::HOME);
    }
}