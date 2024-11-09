<?php

namespace App\Providers;

use App\Models\Review;
use App\Policies\ReviewPolicy;
use App\Services\BookService;
use App\Services\IssuanceService;
use App\Services\ReservationService;
use App\Services\ReviewService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('userService', function () {
            return new UserService();
        });
        $this->app->bind('bookService', function () {
            return new BookService();
        });
        $this->app->bind('reservationService', function () {
            return new ReservationService();
        });
        $this->app->bind('issuanceService', function () {
            return new IssuanceService();
        });
        $this->app->bind('reviewService', function (){
            return new ReviewService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        Log::alert('--------------------------------------------------------');
//        DB::listen(function ($query) {
//            Log::debug('SQL Query Executed: ' . $query->sql, [
//                'bindings' => $query->bindings,
//                'time' => $query->time . ' ms',
//            ]);
//        });
    }
}
