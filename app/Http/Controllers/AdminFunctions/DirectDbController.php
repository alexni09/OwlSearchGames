<?php

namespace App\Http\Controllers\AdminFunctions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;

class DirectDbController extends Controller {
    public function show(): Response {
        $this->authorize('admin.generic');
        return Inertia::render('AdminFunctions/DirectDb');
    }

    public function execute(Request $request): RedirectResponse {
        $this->authorize('admin.generic');
        DB::unprepared($request['query']);
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}