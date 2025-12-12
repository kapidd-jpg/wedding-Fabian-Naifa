<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Guest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckinController extends Controller
{
    public function scan($code)
    {
        $guest = Guest::where('code', $code)->firstOrFail();
        
        // Cek apakah sudah check-in
        $existingCheckin = Checkin::where('guest_id', $guest->id)->first();
        
        if ($existingCheckin) {
            return response()->json([
                'success' => false,
                'message' => 'Guest already checked in at ' . $existingCheckin->checked_in_at->format('d M Y H:i'),
                'guest' => $guest,
                'checkin' => $existingCheckin
            ], 400);
        }

        // Create check-in
        $checkin = Checkin::create([
            'guest_id' => $guest->id,
            'checked_in_at' => Carbon::now(),
            'checked_by' => request()->ip()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Check-in successful!',
            'guest' => $guest,
            'checkin' => $checkin
        ]);
    }

    public function scanPage()
    {
        return view('checkin-scanner');
    }
}