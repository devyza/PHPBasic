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
        $this->app->bind('App\Contracts\Dao\Employee\EmployeeDaoInterface', 'App\Dao\Employee\EmployeeDao');

        // Service Registration
        $this->app->bind('App\Contracts\Services\Company\CompanyServiceInterface', 'App\Services\Company\CompanyService');
        $this->app->bind('App\Contracts\Services\Employee\EmployeeServiceInterface', 'App\Services\Employee\EmployeeService');
        $this->app->bind('App\Contracts\Services\Mail\MailServiceInterface', 'App\Services\Mail\MailService');
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
