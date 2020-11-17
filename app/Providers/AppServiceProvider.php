<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\LOGO;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $logo = LOGO::where('status', 1)->get();
        View::share('logo', $logo);
    }
}
