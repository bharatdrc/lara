<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Roles' => 'App\Policies\RolesPolicy',
         'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            if(in_array('Admin',$user->roles->pluck('name')->all())){
                return true;
            }
        });
        
        Gate::define('rolesAccess', function ($user) {
            if(in_array('Admin',$user->roles->pluck('name')->all())){
                return true;
            }
        });

        Gate::define('companyAccess', function ($user) {
            if(in_array('CompanyAdmin',$user->roles->pluck('name')->all())){
                return true;
            }
        });

        Gate::define('manageCompanyAccess', function ($user) {
            if(in_array('Admin',$user->roles->pluck('name')->all())){
                return true;
            }
        });

        Gate::define('managePackageAccess', function ($user) {
            if(in_array('Admin',$user->roles->pluck('name')->all())){
                return true;
            }
        });

        
    }
}
