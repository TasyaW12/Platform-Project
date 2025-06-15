@extends('layouts.app')

@section('content')
    <h1>Buat Subkategori Baru untuk Kategori: {{ $category->name }}</h1>
    <form action="{{ route('subkategori.store', $category->id) }}" method="POST">
        @csrf
        <div>
            <label for="name">Nama Subkategori</label>
            <input type="text" name="name" id="name" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection
