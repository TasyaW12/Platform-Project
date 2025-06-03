@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Kelas</h3>

    <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama Kelas</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Subkategori</label>
            <select name="subkategori_id" class="form-control" required>
                <option value="">Pilih Subkategori</option>
                @foreach($subkategoris as $sub)
                    <option value="{{ $sub->id }}">{{ $sub->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
