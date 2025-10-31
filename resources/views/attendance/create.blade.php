@extends('master')
@section('title', 'Tambah Kehadiran')

@section('content')
<div class="container">
    <h1>Tambah Kehadiran</h1>
    <form action="{{ url('/attendance') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Pegawai</label>
            <select name="karyawan_id" required>
                @foreach($employees as $e)
                <option value="{{ $e->id }}">{{ $e->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" required>
        </div>
        <div class="form-group">
            <label>Waktu Masuk</label>
            <input type="time" name="waktu_masuk">
        </div>
        <div class="form-group">
            <label>Waktu Keluar</label>
            <input type="time" name="waktu_keluar">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status_absensi" required>
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
                <option value="alpha">Alpha</option>
            </select>
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection