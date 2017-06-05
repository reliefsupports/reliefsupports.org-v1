<?php

namespace App\Http\Middleware;

use Closure;

class ResolveLocale
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
        \App::setLocale(session('locale', 'si'));

        return $next($request);
    }
}
