<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('team')){
            if(session('team')->is_first_login==1){
                return redirect()->route('change.password');
            }
        }

        else if(session()->has('supervisor')){
            if(session('supervisor')->is_first_login==1){
                return redirect()->route('change.password');
            }
        }

        return $next($request);
    }
}
