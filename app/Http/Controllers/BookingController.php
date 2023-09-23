<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('booking', [
      "title" => "Booking",
      "active" => "booking"
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
    //
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
    return redirect()->back()->with(['success' => "Booking has been updated successfully"]);
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
