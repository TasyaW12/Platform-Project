@extends('layouts.app') 

@section('content')
<div class="container mt-4">
    <h3>Booking Kelas</h3>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="schedule_id" class="form-label">Pilih Jadwal:</label>
            <select name="schedule_id" id="schedule_id" class="form-select" required>
                @foreach($schedules as $schedule)
                    <option value="{{ $schedule->id }}">
                        {{ $schedule->date }} - {{ $schedule->start_time }} ({{ $schedule->instructor_name }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Booking Sekarang</button>
    </form>
</div>
@endsection
