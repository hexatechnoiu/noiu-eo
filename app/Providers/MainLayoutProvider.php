<?php

namespace App\Providers;

use App\Models\Package_category;
use App\Models\Package_type;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MainLayoutProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
     $package_type = Package_type::where('package_category_id', 1)->oldest()->get();
     View::share('sidebar_package_type', $package_type);
    }
}
