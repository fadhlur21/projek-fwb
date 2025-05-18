<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index() {
        $bookings = Booking::with('field')->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function approve($id) {
        Booking::where('id', $id)->update(['status' => 'approved']);
        return back()->with('success', 'booking disetujui');
    }

    public function reject($id) {
        Booking::where('id', $id)->update(['status' => 'rejected']);
        return back()->with('success', 'booking ditolak');
    }
}
