<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

/* Language Support */
// use Illuminate\Support\Facades\App;
use App\UserClasses\BaseLanguage;

/* User Validation, Status, &c */
use App\Models\User;
use App\Models\Locale;

class AuthenticatedSessionController extends Controller
{
    /**
     * remember 
     */
    private const REMEMBER = 'rememberMe';

    /**
     * Display the login view.
     */
    public function create(): Response {
        return Inertia::render('Auth/UserLogin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse {
        /* These ARE NOT the same rules from authenticate(), below */
        $credentials = $request->validate([
            User::MAIN_FIELD => ['required', 'string', 'exists:users'],
            User::PASSWORD_FIELD => ['required', 'string'],
            self::REMEMBER => ['required', 'boolean']
        ]);
        if (User::isActive($credentials[User::MAIN_FIELD])) {
            $user_locale = Locale::getLocaleFromUserId($credentials[User::MAIN_FIELD]);
            $request->authenticate($credentials[self::REMEMBER]); /* uses rules() from LoginRequest */
            $request->session()->regenerate();
            session(['locale' => $user_locale, 'mustUpdateLocale' => true]);
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        return back()->withErrors([
            User::MAIN_FIELD => BaseLanguage::getOneMessage('loginFailed')
        ])->onlyInput(User::MAIN_FIELD);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(RouteServiceProvider::HOME);
    }
}