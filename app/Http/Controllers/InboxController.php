<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Mail\ReplyMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class InboxController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:128',
            'email' => 'required|email:dns',
            'message' => 'required'
        ]);
        Inbox::create($data);
        return redirect()->back()->with('inbox', 'Message sent successfully!');
    }
    public function reply(Request $request){
    $ibx = Inbox::find($request->inbox_id);
    $data =[
        "old_message" => $ibx->message,
        "old_name" => $ibx->message,
        "subject" => auth()->user()->name . " replied to your message",
        "replier" => auth()->user()->name,
        "content" => $request->reply,
        "reply_mail" => "admin@noiu-eo.com",
        "username" => $ibx->name,
    ];

    Mail::to($ibx['email'])->send(new ReplyMail(collect($data)));
    return redirect()->back()->with('success', 'Reply successfully sent to '. $ibx["email"]);
    }
}
