<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\RSVPConfirmation;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input (TAMBAH EMAIL)
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'email' => 'required|email',  // ← TAMBAHAN BARU
            'attendance' => 'required|in:attending,not_attending',
            'total_guests' => 'required|integer|min:1',
            'message' => 'nullable|string|max:500'
        ]);

        // Ambil data guest
        $guest = Guest::findOrFail($request->guest_id);
        
        // Cek quota
        if ($request->total_guests > $guest->quota) {
            return response()->json([
                'success' => false,
                'message' => 'Number of guests exceeds your quota limit (max: ' . $guest->quota . ')'
            ], 400);
        }

        // SIMPAN EMAIL KE GUEST
        $guest->email = $request->email;
        $guest->save();

        // Create new RSVP
        $rsvp = Rsvp::create([
            'guest_id' => $request->guest_id,
            'attendance' => $request->attendance,
            'total_guests' => $request->total_guests,
            'message' => $request->message
        ]);

        // KIRIM EMAIL KONFIRMASI (hanya jika attending)
        if ($request->attendance === 'attending') {
            try {
                // proses RSVP & kirim email
                Mail::to($request->email)->send(new RSVPConfirmation($guest, $rsvp));
            } catch (\Exception $e) {
                Log::error('RSVP Error: ' . $e->getMessage());
                return back()->with('error', $e->getMessage());
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'RSVP submitted successfully!',
            'data' => $rsvp
        ]);
    }
}