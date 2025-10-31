@extends('master')
@section('title', 'Edit Jabatan')

@section('content')
<div class="container">
    <h1>Edit Jabatan</h1>
    <form action="{{ url('/position/'.$position->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" value="{{ $position->nama_jabatan }}" required>
        </div>
        <div class="form-group">
            <label>Gaji Pokok</label>
            <input type="number" name="gaji_pokok" step="0.01" value="{{ $position->gaji_pokok }}" required>
        </div>
        <button type="submit">Perbarui</button>
    </form>
</div>
@endsection