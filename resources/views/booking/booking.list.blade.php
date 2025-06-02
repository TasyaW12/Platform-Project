@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Booking Saya</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jadwal</th>
                <th>Instruktur</th>
                <th>Status Pembayaran</th>
                <th>Tanggal Booking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->schedule->date }} {{ $booking->schedule->start_time }}</td>
                    <td>{{ $booking->schedule->instructor_name }}</td>
                    <td>{{ ucfirst($booking->payment_status) }}</td>
                    <td>{{ $booking->booking_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
