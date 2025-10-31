@extends('master')

@section('title','Daftar Pegawai')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Daftar Pegawai</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Tambah Pegawai</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Tanggal Lahir</th>
            <th>Departemen</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($employees as $employee)
        <tr>
            <td>{{ $employee->nama_lengkap }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->nomor_telepon }}</td>
            <td>{{ $employee->tanggal_lahir }}</td>
            <td>{{ optional($employee->department)->nama_departemen }}</td>
            <td>{{ optional($employee->position)->nama_jabatan }}</td>
            <td>{{ $employee->status }}</td>
            <td>
                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">Detail</a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Tidak ada data pegawai</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection