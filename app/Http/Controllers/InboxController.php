<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;

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
}
