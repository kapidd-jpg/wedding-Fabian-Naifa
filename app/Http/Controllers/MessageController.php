<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required',
            'message' => 'required|max:500'
        ]);

        $msg = Message::create([
            'guest_id' => $request->guest_id,
            'message' => $request->message
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'name' => $msg->guest->name,
                'message' => $msg->message,
                'time' => $msg->created_at->diffForHumans()
            ]
        ]);
    }
}
