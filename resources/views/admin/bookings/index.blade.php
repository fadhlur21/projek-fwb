@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #2e2e2e;
        color: #f0f0f0;
    }

    .card {
        background-color: #3a3a3a;
        border-color: #444;
    }

    .table {
        color: #f0f0f0;
    }

    .table thead {
        background-color: #4a4a4a;
        color: #ffffff;
    }

    .table tbody tr {
        border-color: #555;
    }

    .table-hover tbody tr:hover {
        background-color: #505050;
    }

    .btn-success, .btn-danger {
        border: none;
    }

    .badge {
        font-size: 0.9rem;
    }
</style>

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">🗂️ Daftar Booking</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($bookings->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead>
                            <tr>
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
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->customer->nama }}</td>
                                    <td>{{ $booking->customer->telepon }}</td>
                                    <td>
                                        {{ $booking->field->nama_lapangan }}<br>
                                        <small class="text-muted">{{ $booking->field->tipe_lapangan }}</small>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y') }}</td>
                                    <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($booking->status == 'approved') bg-success 
                                            @elseif($booking->status == 'rejected') bg-danger 
                                            @else bg-warning text-dark 
                                            @endif">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($booking->status === 'pending')
                                            <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm">✔️</button>
                                            </form>
                                            <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger btn-sm">❌</button>
                                            </form>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted">Belum ada data booking.</p>
            @endif
        </div>
    </div>
</div>
@endsection
