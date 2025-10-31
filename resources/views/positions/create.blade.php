@extends('master')
@section('title', 'Tambah Jabatan')

@section('content')
<div class="container">
    <h1>Tambah Jabatan</h1>
    <form action="{{ url('/position') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" required>
        </div>
        <div class="form-group">
            <label>Gaji Pokok</label>
            <input type="number" name="gaji_pokok" step="0.01" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection