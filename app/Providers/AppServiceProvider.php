<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUser();
        $this->registerCategory();
        $this->registerChannel();
        $this->registerCustomer();
        $this->registerRole();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function registerUser(){
        $this->app->when('App\Http\Controllers\Api\UserController')
            ->needs('App\Domain\Contracts\UserInterface')
            ->give('App\Domain\Repositories\UserRepository');
    }
    public function registerChannel()
    {
        $this->app->when('App\Http\Controllers\Api\ChannelController')
            ->needs('App\Domain\Contracts\ChannelInterface')
            ->give('App\Domain\Repositories\ChannelRepository');
    }
    public function registerCustomer(){
        $this->app->when('App\Http\Controllers\Api\CustomerController')
            ->needs('App\Domain\Contracts\CustomerInterface')
            ->give('App\Domain\Repositories\CustomerRepository');
    }
    public function registerRole(){
        $this->app->when('App\Http\Controllers\Api\RoleController')
            ->needs('App\Domain\Contracts\RoleInterface')
            ->give('App\Domain\Repositories\RoleRepository');
    }
    public function registerCategory(){
        $this->app->when('App\Http\Controllers\Api\CategoryController')
            ->needs('App\Domain\Contracts\CategoryInterface')
            ->give('App\Domain\Repositories\CategoryRepository');
    }
}
