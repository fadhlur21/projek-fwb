@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Daftar Booking Lapangan</h5>
        </div>
        <div class="card-body">
            @if($bookings->isEmpty())
                <p class="text-muted">Belum ada data booking.</p>
            @else
                <div class="table-responsive">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $i => $booking)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $booking->customer->nama ?? '-' }}</td>
                                    <td>{{ $booking->customer->telepon ?? '-' }}</td>
                                    <td>{{ $booking->field->nama_lapangan ?? '-' }}</td>
                                    <td>{{ $booking->tanggal_booking }}</td>
                                    <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                                    <td>
                                        <span class="badge bg-{{ $booking->status == 'pending' ? 'warning' : ($booking->status == 'approved' ? 'success' : 'danger') }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
