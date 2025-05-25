@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Booking Lapangan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Lapangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->customer->nama ?? '-' }}</td>
                <td>{{ $booking->customer->telepon ?? '-' }}</td>
                <td>{{ $booking->field->nama_lapangan ?? '-' }}</td>
                <td>{{ $booking->tanggal_booking }}</td>
                <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                <td>
                    <span class="badge 
                        {{ $booking->status == 'pending' ? 'bg-warning' : ($booking->status == 'approved' ? 'bg-success' : 'bg-danger') }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
                <td>
                    @if($booking->status === 'pending')
                        <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success btn-sm">Approve</button>
                        </form>

                        <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    @else
                        <em>Tidak ada aksi</em>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
