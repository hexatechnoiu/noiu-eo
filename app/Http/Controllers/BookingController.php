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

class BookingController extends Controller
{
  public function index()
  {
    $booking = Booking::latest()->where('user_id', auth()->user()->id)->paginate(5);
    if (request('search')) {
    $booking = Booking::latest()->where('user_id', auth()->user()->id)->where('name', 'LIKE', '%' . request('search') . '%')->orWhere('payment_method', 'LIKE', '%' . request('search') . '%')->orWhere('phone', 'LIKE', '%' . request('search') . '%')->paginate(5);

      return view('booking', [
        "title" => "Booking",
        "active" => "booking",
        "booking" => $booking,
      "sbc" => $booking->count()

      ]);
    }

    return view('booking', [
      "title" => "Booking",
      "active" => "booking",
      "booking" => $booking,
      "sbc" => $booking->count()
    ]);
  }


  public function create()
  {

  }

  public function store(Request $request)
  {
    // Benerin phone untuk mencegah vulnerable
    $request['phone'] =  str_replace([" ", ".", "+", "(", ")"], '', $request['phone']);
    $request['status'] =  'Pending';

    // Validasi datanya
    $validated_data = $request->validate([
      "name" => "required",
      "status" => "required",
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
      "status" => $validated_data['status'],
      "user_name_db" => $user->name,
      "order_name" => $validated_data['name'],
      "subject" => "Your Order from NOIU EO",
      "reply_name" => "NOIU EO",
      "reply_mail" => "laravel@noiu-eo.com",
      "package_name" => $package->name,
      "payment_method" => $validated_data['payment_method'],
      "package_price" => "Rp. " . number_format($package->price, 0, ',', '.'),
      "package_desc" => $package->desc,
      "for_date" => $formattedDate,
    ];

    Mail::to($user->email)->send(new Invoice(collect($detail)));
    return redirect(route('booking.index'))->with(['success' => 'Booked successfully. Please check your  email for your invoce, Enjoy!']);

  }

  public function update(Request $request, Booking $booking)
  {
    $data = $request->validate([
      "name" => "required",
      "phone" => "required|numeric",
      "payment_method" => "required",
      "status" => "required",
      "package_id" => "required",
      "date" => "date|required"
    ]);


    $Booking = Booking::find($booking->id);
    $Booking->update($data);
    $originalDate = new DateTime($data['date']);
    $formattedDate = $originalDate->format('d F Y');

    $detail = [
      "booking_id" => $Booking->id,
      "user_name_db" => $Booking->User->name,
      "order_name" => $data['name'],
      "status" => $data['status'],
      "subject" => "Your Order Has Changed",
      "reply_name" => "NOIU EO",
      "reply_mail" => "laravel@noiu-eo.com",
      "package_name" => $booking->package->name,
      "payment_method" => $data['payment_method'],
      "package_price" => "Rp. " . number_format($Booking->package->price, 0, ',', '.'),
      "package_desc" => $Booking->package->desc,
      "for_date" => $formattedDate,
    ];
    Mail::to($Booking->user->email)->send(new Invoice(collect($detail)));
    return redirect()->back()->with(['success' => "Booking has been updated successfully"]);
  }


  public function destroy(Booking $booking)
  {
    Booking::destroy($booking->id);
    return redirect()->back()->with(['success' => "Booking has been deleted successfully"]);
  }

  public function cancel(int $id){
    $booking = Booking::where('id', $id);
    $booking->update(['status'=> 'Pending Cancel']);
    return redirect()->back()->with(['success' => "Cancel booking request has been sent to admin"]);
  }
}
