<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$data)
    {
        if (Auth::check()) {
            if(Auth::user()->id == 1){
                return $next($request);
            }
            if(Auth::user()->role_id == 0){
                Toastr::error('You don\'t have access to that section');
                return redirect()->route('dashboard'); 
            }
            if (Auth::user()->sectionCheck($data)){
                return $next($request);
            }
        }
        Toastr::error('You don\'t have access to that section');
        return redirect()->route('dashboard');
    }
}
