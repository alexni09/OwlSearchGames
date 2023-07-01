<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use App\Models\UserUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

class VerifyUserStatus {
    /**
     * Handles an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response | RedirectResponse {
        if ($request->user() === null) return $next($request);
        else if ($request->user()->status === User::STATUS_FIELD_ACTIVE) {
            if (!$request->user()->hasVerifiedEmail()) return redirect()->intended('verify-email');
            else return $next($request);
        } else if ($request->user()->status === User::STATUS_FIELD_LOGOUT_NEXT || $request->user()->status === User::STATUS_FIELD_LOGOUT) {
            if ($request->user()->status === User::STATUS_FIELD_LOGOUT_NEXT) {
                UserUpdate::addUpdated($request->user()->id);
                $request->user()->status = User::STATUS_FIELD_ACTIVE;
                $request->user()->save();
            }
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect(RouteServiceProvider::HOME);
        } else if ($request->user()->status === User::STATUS_FIELD_PASSWORD_EXPIRED) return redirect()->intended('password-expired');
        else throw new AuthorizationException('Unauthorized.',403);
    }
}