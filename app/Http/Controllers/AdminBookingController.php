<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index() {
        $bookings = Booking::with('field', 'customer')->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function approve($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'approved';
    $booking->save();

    return redirect()->route('admin.bookings.index')->with('success', 'Booking disetujui.');
}

public function reject($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'rejected';
    $booking->save();

    return redirect()->route('admin.bookings.index')->with('success', 'Booking ditolak.');
}
}
