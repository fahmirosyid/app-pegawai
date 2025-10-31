@extends('master')
@section('title', 'Daftar Departemen')

@section('content')
<div class="container">
    <h1>Daftar Departemen</h1>
    <a href="{{ url('/department/create') }}">Tambah Departemen</a>

    @if(session('success'))
    <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $d)
            <tr>
                <td>{{ $d->nama_departemen }}</td>
                <td>
                    <a href="{{ url('/department/'.$d->id) }}">Lihat</a> |
                    <a href="{{ url('/department/'.$d->id.'/edit') }}">Edit</a> |
                    <form action="{{ url('/department/'.$d->id) }}" method="POST" class="inline-form">
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