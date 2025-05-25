<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Field;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create() {
        $fields = Field::all();
        return view ('booking.create', compact('fields'));
    }

   


public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'telepon' => 'required',
        'field_id' => 'required|exists:fields,id',
        'tanggal_booking' => 'required|date',
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
    ]);

    // Simpan customer terlebih dahulu
    $customer = Customer::create([
        'nama' => $request->nama,
        'telepon' => $request->telepon,
    ]);

    // Simpan booking dengan customer_id
    Booking::create([
        'customer_id' => $customer->id,
        'field_id' => $request->field_id,
        'tanggal_booking' => $request->tanggal_booking,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'status' => 'pending',
    ]);

    return redirect()->route('booking.create')->with('success', 'Booking berhasil dibuat');
}



}
