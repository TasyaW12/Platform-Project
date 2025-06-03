@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Subkategori</h2>

        <form action="{{ route('subkategori.update', $subkategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Subkategori</label>
                <input type="text" name="nama" class="form-control" value="{{ $subkategori->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select name="kategori_id" class="form-control" required>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}" {{ $subkategori->kategori_id == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection