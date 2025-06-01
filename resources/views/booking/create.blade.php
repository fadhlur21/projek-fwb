@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #2e2e2e;
        color: #f0f0f0;
    }

    .card {
        background-color: #3a3a3a;
        border: 1px solid #444;
    }

    .form-control,
    .form-select {
        background-color: #4a4a4a;
        color: #f0f0f0;
        border: 1px solid #555;
    }

    .form-control:focus,
    .form-select:focus {
        background-color: #505050;
        color: #fff;
        border-color: #777;
        box-shadow: none;
    }

    label {
        color: #f0f0f0;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .alert-success {
        background-color: #28a745;
        color: white;
        border: none;
    }

    .text-danger {
        font-size: 0.875rem;
    }
</style>

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">📅 Form Booking Lapangan</h5>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('booking.store') }}">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                    @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Telepon -->
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                    @error('telepon') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Lapangan -->
                <div class="mb-3">
                    <label for="field_id" class="form-label">Pilih Lapangan</label>
                    <select class="form-select" id="field_id" name="field_id" required>
                        <option value="">-- Pilih --</option>
                        @foreach($fields as $field)
                            <option value="{{ $field->id }}">{{ $field->nama_lapangan }} - {{ $field->tipe_lapangan }}</option>
                        @endforeach
                    </select>
                    @error('field_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Tanggal -->
                <div class="mb-3">
                    <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
                    <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" required>
                    @error('tanggal_booking') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Jam Mulai -->
                <div class="mb-3">
                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                    @error('jam_mulai') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- Jam Selesai -->
                <div class="mb-3">
                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                    @error('jam_selesai') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Kirim Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
