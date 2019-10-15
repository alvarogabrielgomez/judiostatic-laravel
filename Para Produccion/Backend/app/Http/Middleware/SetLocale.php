<?php

namespace judiostatic\Http\Middleware;

use Closure;
use Config;
use Cookie;

class SetLocale
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
        $cookieLocale = $request->cookie('locale');

        if($cookieLocale){
            app()->setLocale($cookieLocale);
        }else{
            app()->setLocale(Config::get('app.locale'));
        }
        return $next($request);
    }
}
