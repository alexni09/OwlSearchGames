<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class ContactFormController extends Controller {
    public function show(): Response {
        return Inertia::render('Public/ContactForm');
    }
    
    public function sendMail(Request $request): RedirectResponse {
        //
    }
}