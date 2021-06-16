<?php

namespace App\Providers;

use App\Repositories\Impl\MemberRepositoryImpl;
use App\Repositories\MemberRepository;
use App\Services\Impl\MemberServiceImpl;
use App\Services\MemberService;
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
            MemberRepository::class,
            MemberRepositoryImpl::class
        );

        $this->app->singleton(
            MemberService::class,
            MemberServiceImpl::class
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
