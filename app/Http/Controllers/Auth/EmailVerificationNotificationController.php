<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Events\UserRequestedAnotherVerificationEmail;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\Mailer\Exception\TransportException;

class EmailVerificationNotificationController extends Controller {
    /**
     * Sends another email verification notification.
     */
    public function store(Request $request): RedirectResponse|Response {
        if ($request->user()->hasVerifiedEmail()) return redirect()->intended(RouteServiceProvider::HOME);
        try {
            event(new UserRequestedAnotherVerificationEmail($request->user()));
        } catch(TransportException) {
            return Inertia::render('Auth/EmailNotSent');
        }
        return back()->with('status', 'verification-link-sent');
    }
}