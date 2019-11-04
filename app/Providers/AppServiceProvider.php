<?php

namespace judiostatic\Providers;

use ExportLocalization;
use Illuminate\Support\Facades\View;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        View::composer('auth.login', function ( $view ) {

            return $view->with( [
                'messages' => ExportLocalization::export()->toFlat(),
            ] );
        } );

        View::composer('deals.show', function ( $view ) {

            return $view->with( [
                'messages' => ExportLocalization::export()->toFlat(),
            ] );
        } );

        
        View::composer('index', function ( $view ) {

            return $view->with( [
                'messages' => ExportLocalization::export()->toFlat(),
            ] );
        } );

        View::composer('home', function ( $view ) {

            return $view->with( [
                'messages' => ExportLocalization::export()->toFlat(),
            ] );
        } );

    }
}
