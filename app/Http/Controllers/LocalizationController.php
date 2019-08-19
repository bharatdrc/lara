<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LocalizationController extends Controller
{
    public function index(Request $request,$locale)
    {

        $config = app('config');
        if(in_array($locale,$config['app.languages'])){
        	$refererRoute = app('router')->getRoutes()->match(app('request')->create(url()->previous()));
        	$refererRouteName = $refererRoute->getName();
        	$refererRouteParams = $refererRoute->parameters;
        	$newRefererRouteParams = array_merge($refererRouteParams,['_locale'=>$locale]);

        	\App::setLocale($locale);
	        //store the locale in session so that the middleware can register it
	        session()->put('locale', $locale);
	    	$url = route($refererRouteName,$newRefererRouteParams);
	    	//dd($url);
	    	return redirect($url,301);
        }

        return redirect()->back();
    }
}
