<?php

namespace App\Http\Controllers;

use App\Mail\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
  public function index()
  {
    $detail = [
      "booking_id" => "10",
      "subject" => "Your trip invoice from NOIU EO",
      "image_url" => "https://gdrive.azfasa15.workers.dev/noiu.svg",
      "reply_name" => "Muhammad Azfa",
      "reply_mail" => "azfasa15@gmail.com",
      "package_name" => "Outbond with Hafiz!",
      "payment_method" => "Gopay & Tokopedia",
      "package_price" => "Rp. 120.000,00",
      "package_desc" => "Outbound with hafiz to sukatali. Nested amidst the picturesque landscape of Sumedang, Sukatali exudes the charm of an enchanting getaway. This hidden gem, blessed with natural beauty, beckons travelers seeking tranquility and adventure alike.",
      "for_date" => "05 October 2023",
    ];

    Mail::to('hafizhaekal03@gmail.com')->send(new Invoice(collect($detail)));
  }
  public function reply()
  {
    $detail = [
      "booking_id" => "10",
      "subject" => "Your trip invoice from NOIU EO",
      "image_url" => "https://gdrive.azfasa15.workers.dev/noiu.svg",
      "reply_name" => "Muhammad Azfa",
      "reply_mail" => "azfasa15@gmail.com",
      "package_name" => "Outbond with Hafiz!",
      "payment_method" => "Gopay & Tokopedia",
      "user_name_db" => "Azfasa15",
      "order_name" => "Azfasa15",
      "package_price" => "Rp. 120.000,00",
      "package_desc" => "Outbound with hafiz to sukatali. Nested amidst the picturesque landscape of Sumedang, Sukatali exudes the charm of an enchanting getaway. This hidden gem, blessed with natural beauty, beckons travelers seeking tranquility and adventure alike.",
      "for_date" => "05 October 2023",
    ];

    return view('emails.test', [
      'detail' => $detail
    ]);
  }
}
