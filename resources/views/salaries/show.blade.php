@extends('master')
@section('title', 'Detail Gaji')

@section('content')
<div class="container">
    <h1>Detail Gaji Pegawai</h1>

    <p><strong>Nama Pegawai:</strong> {{ $salary->employee->nama_lengkap }}</p>
    <p><strong>Bulan:</strong> {{ $salary->bulan }}</p>
    <p><strong>Gaji Pokok:</strong> Rp {{ number_format($salary->gaji_pokok, 2) }}</p>
    <p><strong>Tunjangan:</strong> Rp {{ number_format($salary->tunjangan, 2) }}</p>
    <p><strong>Potongan:</strong> Rp {{ number_format($salary->potongan, 2) }}</p>
    <p><strong>Total Gaji:</strong> Rp {{ number_format($salary->total_gaji, 2) }}</p>

    <a href="{{ url('/salaries') }}">Kembali</a>
</div>
@endsection