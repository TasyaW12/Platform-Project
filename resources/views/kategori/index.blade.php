<!-- resources/views/kategori/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Kategori</h1>
    <a href="{{ route('kategori.create') }}">Buat Kategori Baru</a>
    <ul>
        @foreach($kategoris as $kategori)
            <li>
                {{ $kategori->nama }}
                <a href="{{ route('kategori.edit', $kategori->id) }}">Edit</a>
                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
