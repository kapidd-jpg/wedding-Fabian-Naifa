<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Guest;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'attendance' => 'required|in:attending,not_attending',
            'total_guests' => 'required|integer|min:1',
            'message' => 'nullable|string|max:500'
        ]);

        $rsvp = Rsvp::updateOrCreate(
            ['guest_id' => $request->guest_id],
            [
                'attendance' => $request->attendance,
                'total_guests' => $request->total_guests,
                'message' => $request->message
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'RSVP submitted successfully!',
            'data' => $rsvp
        ]);
    }
}