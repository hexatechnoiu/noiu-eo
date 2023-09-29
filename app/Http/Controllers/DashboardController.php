<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Inbox;
use App\Models\Package;
use App\Models\Package_type;
use App\Models\User;

use function Laravel\Prompts\search;

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
    $status = ['canceled', 'pending_canceled', 'done', 'paid', 'unpaid'];
    if(strtolower(auth()->user()->role) != 'admin'){
      return abort(401);
    }

    $packages = Package::orderBy('package_type_id')->get();
    $package_types = Package_type::get();
    $users = User::get();
    $booking = Booking::latest()->paginate(5);
    $inbox = Inbox::latest()->take(5)->get();
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

    if (request("search")){
      $packages = Package::orderBy('package_type_id')->where('name', 'LIKE', '%' . request('search') . '%')->get();
      $booking = Booking::latest()->where('name', 'LIKE', '%' . request('search') . '%')->paginate(5);
    }

      return view('dashboard.index', [
        "title" => "Dashboard",
        "active" => "dashboard",
        "users" => $users,
        "count" => collect($count),
        "categories" => $package_types,
        "packages" => $packages,
        "paylist" => ['Debit', 'Credit', 'GoPay', 'ShopeePay', 'Dana', 'OVO'],
        "booking" => $booking,
        "inbox" => $inbox,
        "status" => $status
      ]);



  }
}
