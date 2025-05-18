@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Booking Lapangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container">
    <h2 class="mb-4">Form Booking Lapangan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">No. Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
        </div>

        <div class="mb-3">
            <label for="field_id" class="form-label">Pilih Lapangan</label>
            <select name="field_id" class="form-select" required>
                <option value="">-- Pilih Lapangan --</option>
                @foreach($fields as $field)
                    <option value="{{ $field->id }}" {{ old('field_id') == $field->id ? 'selected' : '' }}>
                        {{ $field->nama_lapangan }} - {{ ucfirst($field->tipe_lapangan) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
            <input type="date" name="tanggal_booking" class="form-control" value="{{ old('tanggal_booking') }}" required>
        </div>

        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="{{ old('jam_mulai') }}" required>
        </div>

        <div class="mb-3">
            <label for="jam_selesai" class="form-label">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="{{ old('jam_selesai') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Booking</button>
    </form>
</div>
</body>
</html>

@endsection
