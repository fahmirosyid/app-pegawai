@extends('master')
@section('title', 'Detail Kehadiran')

@section('content')
<div class="container">
    <h1>Detail Kehadiran</h1>

    <p><strong>Nama Pegawai:</strong> {{ $attendance->employee->nama_lengkap }}</p>
    <p><strong>Tanggal:</strong> {{ $attendance->tanggal }}</p>
    <p><strong>Waktu Masuk:</strong> {{ $attendance->waktu_masuk ?? '-' }}</p>
    <p><strong>Waktu Keluar:</strong> {{ $attendance->waktu_keluar ?? '-' }}</p>
    <p><strong>Status:</strong> {{ ucfirst($attendance->status_absensi) }}</p>

    <a href="{{ url('/attendance') }}">Kembali</a>
</div>
@endsection