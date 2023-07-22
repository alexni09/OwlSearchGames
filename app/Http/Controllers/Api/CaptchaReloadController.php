<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaptchaReloadController extends Controller {
    public function show() {
        return [ 'url' => captcha_src() ];
    }
}