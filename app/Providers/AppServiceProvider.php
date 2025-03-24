<?php
namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Request::class, function ($app) {
            return Request::capture(); // Ensure request is captured
        });
    }

    public function boot()
    {
        //
    }
}
