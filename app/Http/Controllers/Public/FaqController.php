<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FaqController extends Controller {
    public function show(): Response {
        return Inertia::render('Public/FaqPage');
    }    
}