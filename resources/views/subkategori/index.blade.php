@extends('layouts.app')

@section('content')
    <h1>Daftar Subkategori untuk Kategori: {{ $category->name }}</h1>
    <a href="{{ route('subkategori.create', $category->id) }}">Buat Subkategori Baru</a>
    <ul>
        @foreach($subcategories as $subcategory)
            <li>
                {{ $subcategory->name }}
                <a href="{{ route('subkategori.edit', [$category->id, $subcategory->id]) }}">Edit</a>
                <form action="{{ route('subkategori.destroy', [$category->id, $subcategory->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
