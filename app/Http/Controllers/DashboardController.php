<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Categories;
use App\Models\Package;
use App\Models\Package_type;
use App\Models\User;

class DashboardController extends Controller
{

  public function packages()
  {
  }
  public function categories()
  {
  }
  public function index()
  {
    $packages = Package::latest()->get();
    $package_types = Package_type::get();
    $users = User::get();
    $count = [
      [
        'name' => 'Users',
        'total' => count($users),
        'icon' => 'fa-solid fa-user fa-2xl'
      ],
      [
        'name' => 'Packages',
        'total' => count($packages),
        'icon' => 'fa-solid fa-list-check fa-2xl'
      ],
      [
        'name' => 'Categories',
        'total' => count($package_types),
        'icon' => 'fa-solid fa-clipboard-list fa-2xl'
      ],
    ];
    return view('dashboard.index', [
      "title" => "Dashboard",
      "active" => "dashboard",
      'users' => $users,
      'count' => collect($count),
      'categories' => $package_types,
      'packages' => $packages,
      'paylist' => ['Debit', 'Credit', 'GoPay', 'ShopeePay', 'Dana', 'OVO'],
      'books' => Booking::latest()->paginate(5)
    ]);
  }
}
