<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Package_category;
use App\Models\Package_type;
use App\Models\User;

class DashboardController extends Controller
{
    public function user()
    {
        return view('dashboard.users', [
            "title" => "Users",
            "active" => "dashboard",
            "users" => User::latest()->get()
        ]);
    }
    public function packages()
    {

    }
    public function categories()
    {
        return view('dashboard.categories', [
            "title" => "Categories",
            "active" => "dashboard",
            "categories" => Package_category::with('Package_types')->latest()->get()
        ]);
    }
    public function index()
    {

        return view('dashboard.index', [
            "title" => "Dashboard",
            "active" => "dashboard",
            'users' => User::count(),
            'packages' => Package::count(),
            'categories' => Package_type::count()
        ]);
    }
}
