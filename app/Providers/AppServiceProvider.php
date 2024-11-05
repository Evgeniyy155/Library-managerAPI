<?php

namespace App\Providers;

use App\Services\BookService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('userService', function (){
            return new UserService();
        });
        $this->app->bind('bookService', function (){
            return new BookService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
