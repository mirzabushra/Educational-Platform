<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check())){
            if(Auth::User()->category == 3){
                return $next($request);
            }
            else{
                Auth::logout();
                return redirect("login");
            }

        }
        else{
            Auth::logout();
            return redirect("login");

        }
    }
}
