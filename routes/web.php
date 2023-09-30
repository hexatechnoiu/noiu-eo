<?php

use App\Models\Inbox;
use App\Models\OurTeam;
use App\Models\Package;
use App\Models\Benefits;
use App\Models\Package_type;
use App\Models\Package_category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Requests\SearchPackageRequest;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Package_typeController;

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

// Route::redirect('/', '/home');

Route::get('/', function () {
    $ben = Benefits::get();
    return view('home', [
        "title" => "Home",
        "active" => "home",
        "benefits" => $ben
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

Route::get('/dashboard/inbox', function () {
  return view('dashboard.inbox', [
      "title" => "Message",
      "active" => "dashboard",
      "inbox" => Inbox::latest()->paginate(5)
  ]);
});

Route::controller(DashboardController::class)->group(
    function () {
        Route::get('/dashboard', 'index')->middleware('auth');
        // Route::get('/dashboard/packages', 'packages')->middleware('auth');
    }
    )->name('dashboard');


Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->middleware('guest')->name('login');
    Route::get('/register', 'register')->middleware('guest');
    Route::post('/register', 'store');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::post('/send', [InboxController::class, 'store']);
Route::resource('/dashboard/packages', PackageController::class)->middleware('auth');
Route::resource('/dashboard/categories', Package_typeController::class)->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/booking', BookingController::class)->middleware('auth');
// Route::get("/test_email", [MailController::class, 'index']);

Route::get("/email/invoice", [MailController::class, 'invoice']);
Route::get("/email/reply", [MailController::class, 'reply']);
Route::put("/booking/cancel/{Booking:id}", [BookingController::class, 'cancel']);
Route::post("/inbox/reply", [InboxController::class, 'reply']);


// Route::get('/dashboard/packages', [PackageController::class, 'index']);
