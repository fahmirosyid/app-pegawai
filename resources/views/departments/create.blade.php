@extends('master')
@section('title', 'Tambah Departemen')

@section('content')
<div class="container">
    <h1>Tambah Departemen</h1>
    <form action="{{ url('/department') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Departemen</label>
            <input type="text" name="nama_departemen" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection