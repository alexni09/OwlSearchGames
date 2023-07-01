<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use Inertia\Inertia;
use Inertia\Response;
use App\Providers\RouteServiceProvider;
use App\Models\OldPassword;

class PasswordController extends Controller {
    /**
     * Shows the form for updating the user's password.
     */
    public function create(): Response {
        $this->authorize('password.update');
        return Inertia::render('Auth/UpdatePassword');
    }

    /**
     * Updates the user's password.
     */
    public function update(Request $request): RedirectResponse {
        $this->authorize('password.update');
        $validated = $request->validate([
            'current_password' => ['required', 'different:new_password', 'current_password'],
            'new_password' => ['required', Password::defaults(), 'confirmed'],
            'new_password_confirmation' => ['required', Password::defaults()]
        ]);
        $request->user()->update([
            'password' => Hash::make($validated['new_password'])
        ]);
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}