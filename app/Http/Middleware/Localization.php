<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Support\Facades\URL;

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
            URL::defaults(['_locale' => $locale]);
          //  dd($locale);
        }
        URL::defaults(['_locale' => 'en']);

       // url()->defaults(array('_locale'=>'de'));
        return $next($request);
    }
}