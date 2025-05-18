@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Booking Kamu</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lapangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->field->nama_lapangan }}</td>
                    <td>{{ $booking->tanggal_booking }}</td>
                    <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
