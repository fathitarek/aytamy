<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLanguage
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
        app()->setLocale('ar');
       $lang= $request->header('Accept-Language');
        if(isset($lang)  && $lang == 'en' ){
            app()->setLocale('en');
        }
        if(isset($lang)  && $lang == 'ar' ){
            app()->setLocale('ar');
        }
            

        return $next($request);
    }
}
