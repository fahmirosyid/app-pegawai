@extends('master')
@section('title', 'Edit Data Gaji')

@section('content')
<div class="container">
    <h1>Edit Data Gaji</h1>
    <form action="{{ url('/salaries/'.$salary->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Pegawai</label>
            <select name="karyawan_id" required>
                @foreach($employees as $e)
                <option value="{{ $e->id }}" {{ $salary->karyawan_id == $e->id ? 'selected' : '' }}>
                    {{ $e->nama_lengkap }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Bulan</label>
            <input type="text" name="bulan" value="{{ $salary->bulan }}" required>
        </div>

        <div class="form-group">
            <label>Gaji Pokok</label>
            <input type="number" step="0.01" name="gaji_pokok" value="{{ $salary->gaji_pokok }}" required>
        </div>

        <div class="form-group">
            <label>Tunjangan</label>
            <input type="number" step="0.01" name="tunjangan" value="{{ $salary->tunjangan }}">
        </div>

        <div class="form-group">
            <label>Potongan</label>
            <input type="number" step="0.01" name="potongan" value="{{ $salary->potongan }}">
        </div>

        <div class="form-group">
            <label>Total Gaji</label>
            <input type="number" step="0.01" name="total_gaji" value="{{ $salary->total_gaji }}" required>
        </div>

        <button type="submit">Perbarui</button>
    </form>
</div>
@endsection