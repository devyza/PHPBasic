<?php

namespace App\Providers;

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
        // DAO Registration
        $this->app->bind('App\Contracts\Dao\Company\CompanyDaoInterface', 'App\Dao\Company\CompanyDao');

        // Service Registration
        $this->app->bind('App\Contracts\Services\Company\CompanyServiceInterface', 'App\Services\Company\CompanyService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
