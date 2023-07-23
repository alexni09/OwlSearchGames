<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Symfony\Component\Mailer\Exception\TransportException;
use App\Events\ContactEmailSent;
use App\Providers\RouteServiceProvider;

class ContactFormController extends Controller {
    public function show(): Response {
        return Inertia::render('Public/ContactForm');
    }

    public function sendMail(Request $request): RedirectResponse|Response {
        $request->validate([
            User::MAIN_FIELD => ['nullable', 'string', 'exists:users'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'message' => ['required', 'string', 'max:250'],
            'captcha' => ['required', 'min:6', 'max:6', 'captcha']
        ]);
        try {
            event(new ContactEmailSent($request->name, $request->email, $request->message, $request->user_id));
        } catch(TransportException) {
            return Inertia::render('Auth/EmailNotSent');
        }
        return redirect(RouteServiceProvider::HOME);
    }
}