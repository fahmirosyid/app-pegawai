@extends('master')

@section('title','Edit Pegawai')

@section('content')
<h1>Edit Pegawai</h1>

<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}">
        @error('nama_lengkap') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <!-- sisanya sama seperti create, gunakan old(..., $employee->field) untuk value -->
    <!-- Departemen select: -->
    <div class="mb-3">
        <label>Departemen</label>
        <select name="departemen_id" class="form-select">
            <option value="">-- Pilih Departemen --</option>
            @foreach($departments as $d)
            <option value="{{ $d->id }}" {{ (old('departemen_id', $employee->departemen_id) == $d->id) ? 'selected' : '' }}>
                {{ $d->nama_departemen }}
            </option>
            @endforeach
        </select>
    </div>

    <!-- tambahkan tombol -->
    <button class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection