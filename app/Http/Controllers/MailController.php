<?php

namespace App\Http\Controllers;

use App\Mail\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
  public function invoice()
  {
    $detail = [
      "booking_id" => "10",
      "subject" => "Your trip invoice from NOIU EO",
      "status" => "Unpaid",
      "user_name_db" => "anu",
      "order_name" => "anuanmu",
      "reply_name" => "Muhammad Azfa",
      "reply_mail" => "azfasa15@gmail.com",
      "package_name" => "Outbond with Hafiz!",
      "payment_method" => "Gopay & Tokopedia",
      "package_price" => "Rp. 120.000,00",
      "package_desc" => "Outbound with hafiz to sukatali. Nested amidst the picturesque landscape of Sumedang, Sukatali exudes the charm of an enchanting getaway. This hidden gem, blessed with natural beauty, beckons travelers seeking tranquility and adventure alike.",
      "for_date" => "05 October 2023",
    ];

    return view('emails.invoice', [
      'detail' => $detail
    ]);
  }
  public function reply()
  {

    $data =[
      "old_message" => "Ini adalah teks dummy singkat untuk mengisi ruang kosong. Teks ini tidak memiliki makna sebenarnya, tetapi digunakan sebagai contoh atau placeholder dalam desain atau pengujian.",
      "subject" => auth()->user()->name . " replied to your message",
      "replier" => "Admin",
      "content" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione illum, fugit voluptates delectus ducimus, maiores distinctio praesentium dolorum sit doloribus itaque dolor? Molestiae alias accusamus molestias inventore, numquam deserunt eligendi?",
      "reply_mail" => "admin@noiu-eo.com",
      "username" => "User",
    ];
    return view('emails.reply', [
      'data' => $data
    ]);
  }
}
