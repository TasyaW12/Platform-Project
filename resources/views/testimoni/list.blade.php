@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Testimoni Saya</h2>

    @if($testimonis->isEmpty())
        <p>Belum ada testimoni.</p>
    @else
        <ul class="list-group">
            @foreach ($testimonis as $testimoni)
                <li class="list-group-item">
                    <strong>Kelas:</strong> {{ $testimoni->class->title ?? 'Tidak diketahui' }} <br>
                    <strong>Rating:</strong> {{ $testimoni->rating }} bintang <br>
                    <strong>Komentar:</strong> {{ $testimoni->comment ?? '-' }} <br>
                    <small><em>Dikirim pada {{ $testimoni->created_at->format('d M Y') }}</em></small>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
