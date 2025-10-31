@extends('master')
@section('title', 'Data Gaji Pegawai')

@section('content')
<div class="container">
    <h1>Data Gaji Pegawai</h1>
    <a href="{{ url('/salaries/create') }}">Tambah Data Gaji</a>

    @if(session('success'))
    <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>Bulan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $s)
            <tr>
                <td>{{ $s->employee->nama_lengkap }}</td>
                <td>{{ $s->bulan }}</td>
                <td>{{ number_format($s->gaji_pokok, 2) }}</td>
                <td>{{ number_format($s->tunjangan, 2) }}</td>
                <td>{{ number_format($s->potongan, 2) }}</td>
                <td>{{ number_format($s->total_gaji, 2) }}</td>
                <td>
                    <a href="{{ url('/salaries/'.$s->id) }}">Lihat</a> |
                    <a href="{{ url('/salaries/'.$s->id.'/edit') }}">Edit</a> |
                    <form action="{{ url('/salaries/'.$s->id) }}" method="POST" class="inline-form">
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