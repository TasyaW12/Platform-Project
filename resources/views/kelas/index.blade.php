@extends('layouts.app')

@section('content')
    <h1>Daftar Kelas untuk Subkategori: {{ $subcategory->name }}</h1>
    <a href="{{ route('kelas.create', $subcategory->id) }}">Buat Kelas Baru</a>
    <ul>
        @foreach($classes as $class)
            <li>
                {{ $class->title }} - {{ $class->price }}
                <a href="{{ route('kelas.edit', [$subcategory->id, $class->id]) }}">Edit</a>
                <form action="{{ route('kelas.destroy', [$subcategory->id, $class->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
