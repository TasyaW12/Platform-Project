<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function create($kelas_id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        return view('jadwal.create', compact('kelas'));
    }

    public function store(Request $request, $kelas_id)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'instructor_name' => 'required|string|max:255',
        ]);

        $kelas = Kelas::findOrFail($kelas_id);
        $kelas->schedules()->create([
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'instructor_name' => $request->instructor_name,
        ]);

        return redirect()->route('kelas.show', [$kelas->subcategory_id, $kelas->id])
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }
}
