<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class checkNV
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            Auth::user()->findRoleId(Auth::user()->id);
            if (Auth::user()->roleId == 3 || Auth::user()->roleId == 2) {
                return $next($request);
            } else {
                return back();
            }
        }
        return abort(404);
    }
}
