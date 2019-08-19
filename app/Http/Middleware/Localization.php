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
        $config = app('config');
        $locale = $request->segment(1);
//dd($locale);
        if (session()->has('locale') && ($locale==session()->get('locale'))) {
            App::setLocale($locale);
            URL::defaults(['_locale' => $locale]);
          //  dd($locale);
        }
        elseif(in_array($locale,$config['app.languages'])){

            App::setLocale($locale);
            session()->put('locale', $locale);
            URL::defaults(['_locale' => $locale]);
        }
        else{
            URL::defaults(['_locale' => 'en']);
            App::setLocale('en');
        }


       // url()->defaults(array('_locale'=>'de'));
        return $next($request);
    }
}