<!-- resources/views/kategori/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Buat Kategori Baru</h1>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection
