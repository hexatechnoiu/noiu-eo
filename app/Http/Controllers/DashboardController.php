<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user()
    {
        return view('dashboard.users', [
            "title" => "Users",
            "active" => "dashboard"
        ]);
    }
    public function packages()
    {
        return view('dashboard.packages', [
            "packages" => Package::with('package_type')->latest()->get(),
            "title" => "Packages",
            "active" => "dashboard"
        ]);
    }
    public function categories()
    {
        return view('dashboard.categories', [
            "title" => "Categories",
            "active" => "dashboard"
        ]);
    }
    public function index()
    {
        return view('dashboard.index', [
            "title" => "Dashboard",
            "active" => "dashboard"
        ]);
    }
}