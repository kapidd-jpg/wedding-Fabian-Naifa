<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CheckinController;

// Welcome page
Route::get('/', function () {
    return redirect('/invitation/ABC123');
});

// Guest invitation with QR code
Route::get('/invitation/{code}', [GuestController::class, 'show'])->name('guest.show');
Route::get('/qr/{code}', [GuestController::class, 'showQr'])->name('guest.qr');

// RSVP
Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');

// Wishes
Route::get('/wishes', [WishController::class, 'index'])->name('wishes.index');
Route::post('/wishes', [WishController::class, 'store'])->name('wishes.store');

// Check-in
Route::get('/checkin/scanner', [CheckinController::class, 'scanPage'])->name('checkin.scanner');
Route::get('/checkin/{code}', [CheckinController::class, 'scan'])->name('checkin.scan');