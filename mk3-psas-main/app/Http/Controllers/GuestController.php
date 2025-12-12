<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Wish;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GuestController extends Controller
{
    public function show($code)
    {
        // Cari guest berdasarkan code
        $guest = Guest::where('code', $code)->firstOrFail();
        
        // Generate QR Code
        $qrCode = QrCode::size(200)->generate(route('guest.show', $code));
        
        // Ambil semua wishes yang sudah diapprove
        $wishes = Wish::where('is_approved', true)
                      ->latest()
                      ->take(10)
                      ->get();
        
        return view('invitation', compact('guest', 'qrCode', 'wishes'));
    }

    public function showQr($code)
    {
        $guest = Guest::where('code', $code)->firstOrFail();
        $qrCode = QrCode::size(400)->generate(route('checkin.scan', $code));
        
        return view('qr-code', compact('guest', 'qrCode'));
    }
}