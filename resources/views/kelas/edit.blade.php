@extends('layouts.app')

@section('content')
    <h1>Edit Kelas: {{ $class->title }} (Subkategori: {{ $subcategory->name }})</h1>
    <form action="{{ route('kelas.update', [$subcategory->id, $class->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Judul Kelas</label>
            <input type="text" name="title" id="title" value="{{ old('title', $class->title) }}" required>
        </div>
        <div>
            <label for="description">Deskripsi Kelas</label>
            <textarea name="description" id="description" required>{{ old('description', $class->description) }}</textarea>
        </div>
        <div>
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" value="{{ old('price', $class->price) }}" required>
        </div>
        <div>
            <label for="max_participants">Max Partisipan</label>
            <input type="number" name="max_participants" id="max_participants" value="{{ old('max_participants', $class->max_participants) }}" required>
        </div>
        <button type="submit">Perbarui Kelas</button>
    </form>
@endsection
