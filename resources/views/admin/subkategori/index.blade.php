@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Subkategori</h2>
    <a href="{{ route('subkategori.create') }}" class="btn btn-primary mb-3">+ Tambah Subkategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Subkategori</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subkategoris as $index => $sub)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sub->nama }}</td>
                    <td>{{ $sub->kategori->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ route('subkategori.edit', $sub->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('subkategori.destroy', $sub->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Belum ada data subkategori.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
