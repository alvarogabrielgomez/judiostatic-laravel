<?php

namespace judiostatic\Providers;

use Laravel\Passport\Passport;
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
        'judiostatic\Model' => 'judiostatic\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::routes();

        Passport::tokensCan([
            'user-data' => 'Datos de basicos de usuario',
            'manage-coupons' => 'Acceder y pedir nuevos cupones',
        ]);
        
        $this->registerPolicies();

        Passport::tokensExpireIn(now()->addDays(15));

        Passport::refreshTokensExpireIn(now()->addDays(30));
    
        Passport::personalAccessTokensExpireIn(now()->addDays(1));


        //
    }
}
