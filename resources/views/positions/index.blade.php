@extends('master')
@section('title', 'Daftar Jabatan')

@section('content')
<div class="container">
    <h1>Daftar Jabatan</h1>
    <a href="{{ url('/position/create') }}">Tambah Jabatan</a>

    @if(session('success'))
    <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $p)
            <tr>
                <td>{{ $p->nama_jabatan }}</td>
                <td>{{ number_format($p->gaji_pokok, 2) }}</td>
                <td>
                    <a href="{{ url('/position/'.$p->id) }}">Lihat</a> |
                    <a href="{{ url('/position/'.$p->id.'/edit') }}">Edit</a> |
                    <form action="{{ url('/position/'.$p->id) }}" method="POST" class="inline-form">
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