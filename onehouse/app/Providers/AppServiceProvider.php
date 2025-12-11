<?php

namespace App\Providers;

use App\Models\Checklist;
use App\Models\Profile;
use App\Observers\ProfileObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\URL; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    // チェックリストをすべてのビューで表示する
    public function boot(): void
    {
        // if (Schema::hasTable('checklists')) {
        //     $checkLists = Checklist::all();
        //     View::share('checkLists', $checkLists);
        // }

    }
}
