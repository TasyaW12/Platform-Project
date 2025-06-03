@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Kelas</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Subkategori</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $k)
                <tr>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->subkategori->nama ?? '-' }}</td>
                    <td>Rp {{ number_format($k->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
