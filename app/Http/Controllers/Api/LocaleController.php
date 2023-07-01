<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\UserClasses\BaseLanguage;

class LocaleController extends Controller {
    public function setLocale(Request $request) {
        if (!BaseLanguage::isValidLocale($request['locale'])) abort(403);
        App::setLocale($request['locale']);
        session(['locale' => $request['locale'], 'mustUpdateLocale' => true]);
        return response()->noContent();
    }
}