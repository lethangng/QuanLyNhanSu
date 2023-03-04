<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Author;

class checkNVNS
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
        // dd(Auth::user()->id);
        // Auth::user()->findRoleId(Auth::user()->id);
        // if (Auth::check() && Auth::user()->roleId == 4) {
        //     return $next($request);
        // } else {
        //     return back();
        // }

        if (Auth::check()) {
            Auth::user()->findRoleId(Auth::user()->id);
            if (Auth::user()->roleId == 4) {
                return $next($request);
            } else {
                return back();
            }
        }
        return abort(404);
    }
}
