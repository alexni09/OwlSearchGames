<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\Debugbar\Facades\Debugbar;

class HandleDebugbar {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $user = $request->user();
        $canDebug = $user !== null ? $user->hasPermission('admin.debuggable') : env('UNDEFINED_USER_CAN_DEBUG',false);
        $canDebug ? Debugbar::enable() : Debugbar::disable();
        return $next($request);
    }
}