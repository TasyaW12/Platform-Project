@extends('layouts.app')

@section('content')
    <h1>Buat Kelas Baru untuk Subkategori: {{ $subcategory->name }}</h1>
    <form action="{{ route('kelas.store', $subcategory->id) }}" method="POST">
        @csrf
        <div>
            <label for="title">Judul Kelas</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Deskripsi Kelas</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" required>
        </div>
        <div>
            <label for="max_participants">Max Partisipan</label>
            <input type="number" name="max_participants" id="max_participants" required>
        </div>
        <button type="submit">Simpan Kelas</button>
    </form>
@endsection
