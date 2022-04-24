<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AuthManagement\UserAuth;
use App\Services\AuthManagement\AuthInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthInterface::class, function(){
            return new UserAuth();
        });
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
