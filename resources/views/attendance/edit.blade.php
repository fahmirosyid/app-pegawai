@extends('master')
@section('title', 'Edit Kehadiran')

@section('content')
<div class="container">
    <h1>Edit Data Kehadiran</h1>
    <form action="{{ url('/attendance/'.$attendance->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Pegawai</label>
            <select name="karyawan_id" required>
                @foreach($employees as $e)
                <option value="{{ $e->id }}" {{ $attendance->karyawan_id == $e->id ? 'selected' : '' }}>
                    {{ $e->nama_lengkap }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ $attendance->tanggal }}" required>
        </div>

        <div class="form-group">
            <label>Waktu Masuk</label>
            <input type="time" name="waktu_masuk" value="{{ $attendance->waktu_masuk }}">
        </div>

        <div class="form-group">
            <label>Waktu Keluar</label>
            <input type="time" name="waktu_keluar" value="{{ $attendance->waktu_keluar }}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status_absensi" required>
                @foreach(['hadir', 'izin', 'sakit', 'alpha'] as $status)
                <option value="{{ $status }}" {{ $attendance->status_absensi == $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Perbarui</button>
    </form>
</div>
@endsection