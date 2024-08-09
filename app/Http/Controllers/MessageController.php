<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
   // app/Http/Controllers/MessageController.php
public function store(Request $request, Listing $listing)
{
    $request->validate([
        'message' => 'required|string|max:255',
    ]);

    Message::create([
        'listing_id' => $listing->id,
        'sender_id' => auth()->id(),
        'recipient_id' => $listing->user->id,
        'message' => $request->message,
    ]);

    return back()->with('success', 'Message sent to the owner.');
}

public function index(Listing $listing)
{
    $messages = $listing->messages()->where('recipient_id', auth()->id())->orWhere('sender_id', auth()->id())->get();
    return view('messages.index', compact('messages', 'listing'));
}

}
