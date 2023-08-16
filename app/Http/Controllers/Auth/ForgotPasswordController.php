<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use App\Jobs\SendPasswordExpiredNotification;

class ForgotPasswordController extends Controller {
    /**
     * Shows the form for locating the user whose password is lost.
     */
    public function edit(Request $request): Response {
        return Inertia::render('Auth/ForgotPassword', [
            'method' => 1
        ]);
    }

    /**
     * Finds the user and expires his/her password.
     */
    public function update(Request $request): Response {
        $validated = $request->validate([
            'method' => ['required', 'integer', 'min:1', 'max:2'],
            User::MAIN_FIELD => ['nullable', 'required_if:method,1', 'string', 'min:'.User::MAIN_FIELD_MIN_CHARS, 'max:'.User::MAIN_FIELD_MAX_CHARS, 'exists:'.User::class],
            'email' => ['nullable', 'required_if:method,2', 'string', 'email', 'max:'.User::EMAIL_FIELD_MAX_CHARS, 'exists:'.User::class]
        ]);
        if ($validated['method'] === 1) {
            $user = User::getUserFromUserId($validated[User::MAIN_FIELD]);
        } else if ($validated['method'] === 2) {
            $user = User::getUserFromEmail($validated['email']);
        }
        SendPasswordExpiredNotification::dispatch($user);
        $user->status = User::STATUS_FIELD_PASSWORD_EXPIRED;
        $user->save();
        return Inertia::render('Auth/SendRedefinePasswordEmail');
    }
}