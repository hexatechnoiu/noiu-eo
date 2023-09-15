<?php

use App\Models\Benefits;
use App\Models\Package_category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageController;
use App\Models\OurTeam;
use App\Models\Package;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('home', [
        "title" => "Beranda",
        "active" => "home",
        "benefits" => Benefits::latest()->get()
    ]);
})->name('home');

Route::get('/outbound', function () {
    $package = Package_category::where(['id'=>1])->with('Package_types.Packages')->get();
    return view('outbound', [
        "title" => "Outbound",
        "active" => "outbound",
        "data" => $package
    ]);
})->name('outbound');

Route::get('/mice', function () {
    $package = Package_category::where(['id'=>2])->with('Package_types.Packages')->get();
    return view('mice', [
        "title" => "Mice",
        "active" => "mice",
        "data" => $package

    ]);
})->name('mice');

Route::get('/contact', function () {
    $ot = ourTeam::get();
    return view('contact', [
        "title" => "Contact",
        "active" => "contact",
        "ourTeams" => $ot
    ]);
})->name('contact');

Route::get('/booking', function () {
    return view('booking', [
        "title" => "Booking",
        "active" => "booking"
    ]);
})->middleware('auth')->name('booking');


Route::controller(DashboardController::class)->group(
    function () {
        Route::get('/dashboard', 'index')->middleware('auth');
        Route::get('/dashboard/users', 'user')->middleware('auth');
        Route::get('/dashboard/packages', 'packages')->middleware('auth');
        Route::get('/dashboard/categories', 'categories')->middleware('auth');
    }
)->name('dashboard');


Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->middleware('guest');
    Route::post('/register', 'store');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::post('/send', [InboxController::class, 'store']);
Route::post('/package', [PackageController::class, 'store']);
