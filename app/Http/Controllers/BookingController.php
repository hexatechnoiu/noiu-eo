<?php

namespace App\Http\Controllers;

use App\Mail\Invoice;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class BookingController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $booking = Booking::latest()->where('user_id', auth()->user()->id)->paginate(5);
    if (request('search')) {
      $booking = Booking::latest()->where('user_id', auth()->user()->id)->where('name', 'LIKE', '%' . request('search') . '%')->orWhere('payment_method', 'LIKE', '%' . request('search') . '%')->orWhere('phone', 'LIKE', '%' . request('search') . '%')->paginate(5);

      return view('booking', [
        "title" => "Booking",
        "active" => "booking",
        "booking" => $booking,
      ]);
    }

    return view('booking', [
      "title" => "Booking",
      "active" => "booking",
      "booking" => $booking,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Benerin phone untuk mencegah vulnerable
    $request['phone'] =  str_replace([" ", ".", "+", "(", ")"], '', $request['phone']);

    // Validasi datanya
    $validated_data = $request->validate([
      "name" => "required",
      "user_id" => "required|exists:users,id",
      "package_id" => "required|exists:packages,id",
      "date" => "required|date|unique:bookings,date",
      "payment_method" => "required",
      "phone" => "required|numeric",
    ]);

    // Format tanggalnya
    $originalDate = new DateTime($validated_data['date']);
    $formattedDate = $originalDate->format('d F Y');

    // return $validated_data;
    Booking::create($validated_data);

    // Cari Package Dan User sesuai dengan itunya
    $package = Package::find($validated_data['package_id']);
    $user = User::find($validated_data['user_id']);
    $detail = [
      "booking_id" => "10",
      "user_name_db" => $user->name,
      "order_name" => $validated_data['name'],
      "subject" => "Your Order from NOIU EO",
      "image_url" => "https://gdrive.azfasa15.workers.dev/noiu.svg",
      "reply_name" => "NOIU EO",
      "reply_mail" => "laravel@noiu-eo.com",
      "package_name" => $package->name,
      "payment_method" => $validated_data['payment_method'],
      "package_price" => "Rp. " . number_format($package->price, 0, ',', '.'),
      "package_desc" => $package->desc,
      "for_date" => $formattedDate,
    ];

    Mail::to($user->email)->send(new Invoice(collect($detail)));
    return redirect(route('booking.index'))->with(['success' => 'Booked successfully. Please check your emailfor invoce, Enjoy!']);

  }

  /**
   * Display the specified resource.
   */
  public function show(Booking $booking)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Booking $booking)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Booking $booking)
  {
    // return dd($request);
    $data = $request->validate([
      "name" => "required",
      "phone" => "required|numeric",
      "payment_method" => "required",
      "package_id" => "required",
      "date" => "date|required"
    ]);

    Booking::where('id', $booking->id)->update($data);
    return redirect(route('booking.index'))->with(['success' => "Booking has been updated successfully"]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Booking $booking)
  {
    Booking::destroy($booking->id);
    return redirect()->back()->with(['success' => "Booking successfully dekleted"]);
  }
}
