<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkGuest
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
        if (Auth::check()) {
            return redirect()->route("public.home");
        } else {
            return $next($request);

        }
    }
}
