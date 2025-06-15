<!-- resources/views/kategori/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Kategori</h1>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $kategori->nama) }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
