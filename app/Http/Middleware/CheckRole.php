<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        $user = DB::table('thongtincanhan')->where('User_id', Auth::user()->id)->get();
        foreach ($user as $data) {
            $a = $data->MaChucVu;
        }
        if (Auth::check() && $a == 1) {
            return $next($request);
        } else {
            return redirect("/");
        }
    }
}
