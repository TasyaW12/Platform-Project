@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Berikan Testimoni untuk Kelas</h2>

    <form action="{{ route('testimoni.store') }}" method="POST">
        @csrf
        <input type="hidden" name="class_id" value="{{ $class_id }}">

        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="">-- Pilih Rating --</option>
                @for ($i=1; $i<=5; $i++)
                    <option value="{{ $i }}">{{ $i }} bintang</option>
                @endfor
            </select>
            @error('rating') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Komentar (opsional)</label>
            <textarea name="comment" id="comment" rows="4" class="form-control"></textarea>
            @error('comment') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
    </form>
</div>
@endsection
