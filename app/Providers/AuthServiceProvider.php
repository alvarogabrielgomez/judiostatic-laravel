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
            'manage-devices' => 'Manage devices',
            'place-orders' => 'Place orders',
            'check-status' => 'Check order status',
        ]);
        $this->registerPolicies();
        //
    }
}
