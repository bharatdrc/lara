<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Localization
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
        /*App::setLocale('de');*/
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
            $locale = session()->get('locale');
          //  dd($locale);
        }
        return $next($request);
    }
}