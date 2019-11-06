<?php

namespace App\Providers;
use App\User;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;

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

    public function boot(Dispatcher $events,User $user)
    {
    Schema::defaultStringLength(191);

        }

}
