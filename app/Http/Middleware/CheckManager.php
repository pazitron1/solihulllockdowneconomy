<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         if (Auth::user() &&  Auth::user()->manager == 1) {
                return $next($request);
         }

        session()->flash('success', "Your account doesn't have the right to visit that page!");
        return redirect()->route('home');
    }
}
