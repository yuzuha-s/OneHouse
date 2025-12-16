<?php

namespace App\Providers;

use App\Models\Checklist;
use App\Models\Profile;
use App\Observers\ProfileObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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

    public function boot(): void
    {

        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
