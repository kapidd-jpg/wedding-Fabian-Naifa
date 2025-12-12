--- RUN_APP_LINK: ---
RUN_APP_LINK=http://127.0.0.1:8000/invitation/[CODE]
RUN_APP_LINK_SCANNER=http://127.0.0.1:8000/checkin/scanner
RUN_APP_LINK_DASHBOARD=http://127.0.0.1:8000/admin/dashboard
RUN_APP_LINK_QR=http://127.0.0.1:8000/qr/[CODE]

# CODE INFO:
php artisan migrate:fresh: itu:

- ❌ **Drop** (hapus) semua tabel
- ✅ **Buat ulang** semua tabel dari awal (kosong)
- ✅ Database jadi **bersih** (seperti baru install)

php artisan db:seed --class=GuestSeeder: itu:

- ✅ **Baca** data dari file `GuestSeeder.php` di VSCode
- ✅ **Insert** semua data ke database
- ✅ Data di database = Data di VSCode

PENTING!
⚠️ WARNING;
php artisan migrate:fresh: akan HAPUS SEMUA DATA di database, termasuk;

❌ Data tamu
❌ Data RSVP
❌ Data ucapan/wishes
❌ Data check-in

Jadi;
✅ Pakai saat development/testing (tidak masalah hapus data dummy)
❌ JANGAN pakai saat production (data real tamu akan hilang!

# KESIMPULAN YANG BENAR: 
php artisan db:seed --class=GuestSeeder: → Pakai SEKALI di awal + jika data yamu yang ingin dimassukkan (setup data awal)
php artisan tinker: → Pakai untuk tambah data SETELAHNYA (1 atau banyak)

# INFORMASI UNTUK MENAMBAHKAN TAMU:
1. [i] KODE TAMU DIBUAT SENDIRI;

Jalankan;
php artisan tinker: 

Lalu copy kode dibawah ini, paste di terminal (manapun) dan isi sesuai informasi tamu;
\App\Models\Guest::create([
    'name' => '(nama tamu)',
    'email' => '(email tamu)',
    'phone' => '(no hp tamu)',
    'code' => '[kode dibuat sendiri]',
    'quota' => (jumlah orang yang datang)
]);


2. [i] KODE TAMU DIBUAT OTOMATIS;

Jalankan;
php artisan tinker: 

Lalu copy kode dibawah ini, paste di terminal (manapun) dan isi sesuai informasi tamu;

\App\Models\Guest::create([
    'name' => '(nama tamu)',
    'email' => '(email tamu)',
    'phone' => '(no hp tamu)',
    'code' => strtoupper(\Illuminate\Support\Str::random(6)),  // ← Otomatis!
    'quota' => (jumlah orang yang datang)
]);

\App\Models\Guest::create([
    'name' => 'Naovee',
    'email' => 'banyubirudemas@gmail.com',
    'phone' => '082138065864',
    'code' => strtoupper(\Illuminate\Support\Str::random(6)),  // ← Otomatis!
    'quota' => 1
]);