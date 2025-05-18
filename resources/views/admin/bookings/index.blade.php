@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Daftar Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container">
    <h2 class="mb-4">Daftar Booking Lapangan</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Lapangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->costumer->nama }}</td>
                    <td>{{ $booking->costumer->telepon }}</td>
                    <td>{{ $booking->field->nama_lapangan }}</td>
                    <td>{{ $booking->tanggal_booking }}</td>
                    <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>

@endsection
