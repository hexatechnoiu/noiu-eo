<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::permanentRedirect('/', '/home');

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
})->name('home');

Route::get('/outbound', function () {
    return view('outbound', [
        "title" => "Package",
        "active" => "package"
    ]);
})->name('outbound');

Route::get('/mice', function () {
    return view('mice', [
        "title" => "Mice",
        "active" => "mice"
    ]);
})->name('mice');

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact",
        "active" => "contact"
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
        Route::get('/dashboard', 'index');
        Route::get('/dashboard/users', 'user');
        Route::get('/dashboard/packages', 'packages');
        Route::get('/dashboard/categories', 'categories');
    }
)->name('dashboard')->middleware('auth');


Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->middleware('guest');
    Route::post('/register', 'store');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');

});