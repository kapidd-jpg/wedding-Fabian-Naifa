<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Rsvp;
use App\Models\Wish;
use App\Models\Checkin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $totalGuests = Guest::count();
        $totalRsvps = Rsvp::count();
        $attendingGuests = Rsvp::where('attendance', 'attending')->count();
        $notAttendingGuests = Rsvp::where('attendance', 'not_attending')->count();
        $totalCheckins = Checkin::count();
        $totalWishes = Wish::count();

        // Recent Activity
        $recentRsvps = Rsvp::with('guest')
            ->latest()
            ->take(5)
            ->get();

        $recentCheckins = Checkin::with('guest')
            ->latest()
            ->take(5)
            ->get();

        $recentWishes = Wish::latest()
            ->take(5)
            ->get();

        // All Guests with their RSVP and Check-in status
        $guests = Guest::with(['rsvp', 'checkins'])
            ->orderBy('name')
            ->get();

        return view('dashboard', compact(
            'totalGuests',
            'totalRsvps',
            'attendingGuests',
            'notAttendingGuests',
            'totalCheckins',
            'totalWishes',
            'recentRsvps',
            'recentCheckins',
            'recentWishes',
            'guests'
        ));
    }
}