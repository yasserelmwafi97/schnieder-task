<?php

namespace App\Providers;

use App\Http\Repositories\user\UserRepository;
use App\Http\Repositories\user\UserRepositoryInterface;
use App\Http\Repositories\vacation\VacationRepository;
use App\Http\Repositories\vacation\VacationRepositoryInterface;
use App\Http\Services\user\UserService;
use App\Http\Services\user\UserServiceInterface;
use App\Http\Services\vacation\VacationService;
use App\Http\Services\vacation\VacationServiceInterface;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);

        $this->app->bind(VacationServiceInterface::class, VacationService::class);
        $this->app->bind(VacationRepositoryInterface::class, VacationRepository::class);
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
