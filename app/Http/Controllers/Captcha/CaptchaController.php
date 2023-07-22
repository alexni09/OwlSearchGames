<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CaptchaController extends Controller {
    public function verify(Request $request) {
        $request->validate([
            'captcha' => ['required', 'captcha'],
        ]);
        dd('approved.');
    }
    public function display(): Response {
        return Inertia::render('CaptchaForm');
    }
}