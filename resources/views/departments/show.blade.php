@extends('master')
@section('title', 'Detail Departemen')

@section('content')
<div class="container">
    <h1>Detail Departemen</h1>
    <p><strong>Nama:</strong> {{ $department->nama_departemen }}</p>
    <a href="{{ url('/department') }}">Kembali</a>
</div>
@endsection