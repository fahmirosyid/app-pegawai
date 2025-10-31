@extends('master')
@section('title', 'Detail Jabatan')

@section('content')
<div class="container">
    <h1>Detail Jabatan</h1>
    <p><strong>Nama:</strong> {{ $position->nama_jabatan }}</p>
    <p><strong>Gaji Pokok:</strong> Rp {{ number_format($position->gaji_pokok, 2) }}</p>
    <a href="{{ url('/position') }}">Kembali</a>
</div>
@endsection