@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Edit Kelas</h3>

        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" name="nama" class="form-control" value="{{ $kelas->nama }}" required>
            </div>

            <div class="form-group">
                <label>Subkategori</label>
                <select name="subkategori_id" class="form-control" required>
                    @foreach($subkategoris as $sub)
                        <option value="{{ $sub->id }}" {{ $kelas->subkategori_id == $sub->id ? 'selected' : '' }}>{{ $sub->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $kelas->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $kelas->harga }}" required>
            </div>

            <div class="form-group">
                <label>Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control">
                @if($kelas->gambar)
                    <img src="{{ asset('storage/' . $kelas->gambar) }}" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection