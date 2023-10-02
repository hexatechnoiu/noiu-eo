<?php

namespace App\Providers;

use App\Models\Package_category;
use App\Models\Package_type;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;



class MainLayoutProvider extends ServiceProvider
{
    public function register(): void
    {
    }


    public function boot(): void
    {
if (Schema::hasTable('package_types') && Schema::hasTable('package_categories')) {
    $package_type = Package_type::where('package_category_id', 1)->oldest()->get();
    View::share('sidebar_package_type', $package_type);
}
    }
}
