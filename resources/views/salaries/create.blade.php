@extends('master')
@section('title', 'Tambah Data Gaji')

@section('content')
<div class="container">
    <h1>Tambah Data Gaji</h1>
    <form action="{{ url('/salaries') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Pegawai</label>
            <select name="karyawan_id" required>
                @foreach($employees as $e)
                <option value="{{ $e->id }}">{{ $e->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Bulan</label>
            <input type="text" name="bulan" placeholder="Contoh: Oktober 2025" required>
        </div>

        <div class="form-group">
            <label>Gaji Pokok</label>
            <input type="number" step="0.01" name="gaji_pokok" required>
        </div>

        <div class="form-group">
            <label>Tunjangan</label>
            <input type="number" step="0.01" name="tunjangan" value="0">
        </div>

        <div class="form-group">
            <label>Potongan</label>
            <input type="number" step="0.01" name="potongan" value="0">
        </div>

        <div class="form-group">
            <label>Total Gaji</label>
            <input type="number" step="0.01" name="total_gaji" required>
        </div>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection