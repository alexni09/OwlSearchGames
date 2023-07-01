<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Events\UserRequestedAnotherVerificationEmail;

class EmailVerificationNotificationController extends Controller {
    /**
     * Sends another email verification notification.
     */
    public function store(Request $request): RedirectResponse {
        if ($request->user()->hasVerifiedEmail()) return redirect()->intended(RouteServiceProvider::HOME);
        event(new UserRequestedAnotherVerificationEmail($request->user()));
        return back()->with('status', 'verification-link-sent');
    }
}