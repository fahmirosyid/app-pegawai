@extends('master')
@section('title', 'Edit Departemen')

@section('content')
<div class="container">
    <h1>Edit Departemen</h1>
    <form action="{{ url('/department/'.$department->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama Departemen</label>
            <input type="text" name="nama_departemen" value="{{ $department->nama_departemen }}" required>
        </div>
        <button type="submit">Perbarui</button>
    </form>
</div>
@endsection