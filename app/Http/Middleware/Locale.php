<?php

namespace Projacked\Http\Middleware;

use Closure;

class Locale
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
        $locale = \Config::get('app.locale', 'nl');
        \App::setLocale($locale);
        \Carbon\Carbon::setLocale($locale);
        return $next($request);
    }
}
