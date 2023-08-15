<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Providers\RouteServiceProvider;
use App\Models\Locale;
use App\Models\Pronoun;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\UserUpdate;
use App\Models\DeletedRoleUser;
use Illuminate\Auth\Events\Registered;
use App\Events\UserUpdatedEmail;
use App\Rules\EmailBanned;
use App\Jobs\SendEmailUpdatedVerification;
use App\Jobs\SendUpdatedEmailUserNotificationToAdmins;

class ProfileController extends Controller {
    /**
     * Display the user's profile form, for editing.
     */
    public function edit(Request $request): Response {
        $this->authorize('profile.update');
        $locales = Locale::selectIdLocaleNameIfActive();
        $pronouns = Pronoun::selectIdLocalePronoun();
        return Inertia::render('Auth/EditProfile', [
            'locales' => $locales,
            'pronouns' => $pronouns
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse|Response {
        $this->authorize('profile.update');
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:'.User::NAME_FIELD_MAX_CHARS],
            'email' => ['required', 'string', 'email', 'max:'.User::EMAIL_FIELD_MAX_CHARS, new EmailBanned, Rule::unique('users')->ignore($request->user()->id)],
            'locale_id' => ['required', 'exists:locales,id'],
            'pronoun_id' => ['required', 'exists:pronouns,id'],
            'show_pronoun' => ['required', 'boolean'],
            'show_name' => ['required', 'boolean'],
            'show_email' => ['required', 'boolean'],
            'show_user_id' => ['required', 'boolean']
        ]);
        $request->user()->fill($validated);
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            event(new UserUpdatedEmail($request->user()));
            SendEmailUpdatedVerification::dispatch($request->user());
            SendUpdatedEmailUserNotificationToAdmins::dispatch($request->user());
        }
        UserUpdate::addUpdated($request->user()->id);
        $request->user()->save();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Display the user's profile form, for deleting.
     */
    public function predelete(): Response {
        $this->authorize('profile.delete');
        return Inertia::render('Auth/DeleteProfile');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse {
        $this->authorize('profile.delete');
        $user = $request->user();
        UserUpdate::addDeleted($user->id);
        DeletedRoleUser::insertAllRolesByUserId($user[User::MAIN_FIELD]);
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to(RouteServiceProvider::HOME);
    }
}