@extends('master')
@section('title', 'Data Kehadiran')

@section('content')
<div class="container">
    <h1>Data Kehadiran</h1>
    <a href="{{ url('/attendance/create') }}">Tambah Kehadiran</a>

    @if(session('success'))
    <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $a)
            <tr>
                <td>{{ $a->employee->nama_lengkap }}</td>
                <td>{{ $a->tanggal }}</td>
                <td>{{ $a->waktu_masuk }}</td>
                <td>{{ $a->waktu_keluar }}</td>
                <td>{{ ucfirst($a->status_absensi) }}</td>
                <td>
                    <a href="{{ url('/attendance/'.$a->id) }}">Lihat</a> |
                    <a href="{{ url('/attendance/'.$a->id.'/edit') }}">Edit</a> |
                    <form action="{{ url('/attendance/'.$a->id) }}" method="POST" class="inline-form">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection