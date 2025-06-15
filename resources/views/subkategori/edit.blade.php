@extends('layouts.app')

@section('content')
    <h1>Edit Subkategori: {{ $subcategory->name }} (Kategori: {{ $category->name }})</h1>
    
    <form action="{{ route('subkategori.update', [$category->id, $subcategory->id]) }}" method="POST">
        @csrf
        @method('PATCH') <!-- Menggunakan metode PATCH untuk update -->
        
        <div>
            <label for="name">Nama Subkategori</label>
            <input type="text" name="name" id="name" value="{{ old('name', $subcategory->name) }}" required>
        </div>

        <button type="submit">Perbarui Subkategori</button>
    </form>

    <!-- Tampilkan pesan error jika ada -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
