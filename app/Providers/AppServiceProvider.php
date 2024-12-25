<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Builder;
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
        // the key is too long for long indexes, so we can skip overriding it to 191
        // varchar(191)
        Schema::defaultStringLength(191);
        Builder::defaultMorphKeyType('uuid');

        // pagination
        Paginator::useTailwind();
    }
}
