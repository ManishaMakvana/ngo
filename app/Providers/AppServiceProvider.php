<?php
namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Paginator::useBootstrapFive(); // Use either Bootstrap 5 or Bootstrap 4, not both
         Paginator::useBootstrapFour(); // Uncomment this if you want Bootstrap 4 instead
    }
}
