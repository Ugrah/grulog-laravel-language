<?php

namespace Grulog\Language\Http\Middleware;

use Closure;

class SetLanguageCookie
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
        if( $request->hasCookie('language') && (app()->getLocale() !== $request->cookie('language')) ) {
            $cookie = $request->cookie('language');
            app()->setLocale($cookie);
            
            return $next($request);
        } else {
            $response = $next($request);
            $response->withCookie(cookie('language', session('locale'), 1));
            return $response;
        }
    }
}