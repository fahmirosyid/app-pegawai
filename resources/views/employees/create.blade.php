@extends('master')

@section('title','Tambah Pegawai')

@section('content')
<h1>Tambah Pegawai</h1>

<form action="{{ route('employees.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}">
        @error('nama_lengkap') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}">
        @error('nomor_telepon') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
        @error('tanggal_lahir') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
        @error('alamat') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}">
        @error('tanggal_masuk') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Status</label>
        <input type="text" name="status" class="form-control" value="{{ old('status') }}">
        @error('status') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Departemen</label>
        <select name="departemen_id" class="form-select">
            <option value="">-- Pilih Departemen --</option>
            @foreach($departments as $d)
            <option value="{{ $d->id }}" {{ old('departemen_id') == $d->id ? 'selected' : '' }}>{{ $d->nama_departemen }}</option>
            @endforeach
        </select>
        @error('departemen_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Jabatan</label>
        <select name="jabatan_id" class="form-select">
            <option value="">-- Pilih Jabatan --</option>
            @foreach($positions as $p)
            <option value="{{ $p->id }}" {{ old('jabatan_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_jabatan }}</option>
            @endforeach
        </select>
        @error('jabatan_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection