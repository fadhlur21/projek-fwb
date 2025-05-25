@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Form Booking Lapangan</h5>
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
                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                       id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Telepon -->
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" 
                       id="telepon" name="telepon" value="{{ old('telepon') }}" placeholder="08xxxx..." required>
                @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Lapangan -->
            <div class="mb-3">
                <label for="field_id" class="form-label">Pilih Lapangan</label>
                <select class="form-select @error('field_id') is-invalid @enderror" 
                        id="field_id" name="field_id" required>
                    <option value="">-- Pilih Lapangan --</option>
                    @foreach($fields as $field)
                        <option value="{{ $field->id }}" {{ old('field_id') == $field->id ? 'selected' : '' }}>
                            {{ $field->nama_lapangan }} - {{ $field->tipe_lapangan }}
                        </option>
                    @endforeach
                </select>
                @error('field_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Tanggal -->
            <div class="mb-3">
                <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
                <input type="date" class="form-control @error('tanggal_booking') is-invalid @enderror" 
                       id="tanggal_booking" name="tanggal_booking" value="{{ old('tanggal_booking') }}" required>
                @error('tanggal_booking') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Jam Mulai -->
            <div class="mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" 
                       id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}" required>
                @error('jam_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Jam Selesai -->
            <div class="mb-3">
                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" 
                       id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}" required>
                @error('jam_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Kirim Booking</button>
        </form>
    </div>
</div>
@endsection
