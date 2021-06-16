<?php

namespace App\Providers;

use App\Repositories\Impl\StaffRepositoryImpl;
use App\Repositories\StaffRepository;
use App\Services\Impl\StaffServiceImpl;
use App\Services\StaffService;
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
        $this->app->singleton(
            StaffRepository::class,
            StaffRepositoryImpl::class
        );
        $this->app->singleton(
            StaffService::class,
            StaffServiceImpl::class
        );
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
