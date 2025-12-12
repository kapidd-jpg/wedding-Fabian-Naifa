<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Wish;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function index()
    {
        // Ambil semua data tamu, diurutkan berdasarkan tanggal dibuat terbaru
        $guests = Guest::orderBy('created_at', 'desc')->get();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:guests,email',
            'phone' => 'nullable|string|max:255',
            'quota' => 'required|integer|min:1',
        ]);

        // 2. Buat Kode Akses Otomatis dan Pastikan Keunikannya
        $validatedData['code'] = $this->generateUniqueCode();

        // 3. Membuat Data Baru DAN mengambil instance model yang baru dibuat
        $guest = Guest::create($validatedData); // <-- Perubahan di sini: Simpan hasil create ke variabel $guest

        // 4. Redirect ke halaman 'guest.show' dengan membawa kode tamu
        // Menggunakan $guest->code untuk mendapatkan kode yang baru di-generate
        return redirect()->route('guest.show', ['code' => $guest->code])
                         ->with('success', 'Tamu berhasil ditambahkan! Undangan siap dikirim.'); // <-- Perubahan di sini

        // Perubahan Sebelumnya:
        // return redirect()->route('guests.index')->with('success', 'Tamu berhasil ditambahkan!');
    }
    private function generateUniqueCode(): string
    {
        do {
            // Menghasilkan string acak sepanjang 8 karakter (Anda bisa ubah panjangnya)
            $code = Str::random(8); 
        } while (Guest::where('code', $code)->exists()); // Pastikan kode belum ada

        return $code;
    }

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