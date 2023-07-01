<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Locale;

class VerifyEmailController extends Controller {
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse {
        session(['locale' => Locale::getLocaleFromLocale($request->user()->locale_id), 'mustUpdateLocale' => true]);
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));  /* Please note: This event is unregistered and it will never fire. */
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}