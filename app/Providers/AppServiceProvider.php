<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

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
        // Older MySQL/MariaDB builds commonly shipped with WAMP default to the
        // utf8mb4 charset but an index key limit of 1000 bytes. A VARCHAR(255)
        // utf8mb4 unique index needs ~1020 bytes, which breaks migrations with
        // "Specified key was too long". Capping the default string length to
        // 191 keeps every unique/index column safely under that limit.
        Schema::defaultStringLength(191);

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
