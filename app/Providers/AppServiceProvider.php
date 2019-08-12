<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('customfieldvalue', function ($id) {
            dd($id);
            switch ($customfield->type) {
                case 1:
                    $value = $customfield->customfieldvalues->first()->value_string;
                    break;
                case 2:
                    $value = unserialize($customfield->customfieldvalues->first()->value_string);
                    break;
                case 3:
                    $value = $customfield->customfieldvalues->first()->value_string;
                    break;
                case 4:
                    $value = $customfield->customfieldvalues->first()->value_string;
                    break;
                default:
                    $value = $customfield->customfieldvalues->first()->value_string;
            }
            return $value;
        });//
    }
}
