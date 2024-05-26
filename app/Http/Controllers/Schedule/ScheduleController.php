<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $registrations = registration::all();
        return view('admin.jadwal.index', compact('registrations'));
    }

    public function create($registrationId)
    {
        $registration = registration::find($registrationId);
        return view('admin.jadwal.create', compact('registration'));
    }

    public function store(Request $request, $registrationId)
    {
        $validated = $request->validate([
            'tanggalTestTulis' => 'required|date',
            'tanggalWawancaraAsisten' => 'required|date',
            'tanggalWawancaraDosen' => 'required|date',
        ]);
        $registration = Registration::find($registrationId);

        Schedule::create([
            'scheduleName' => 'test Tulis dan Praktek',
            'scheduleDate' => $validated['tanggalTestTulis'],
            'registrationId' => $registration->id,
        ]);

        Schedule::create([
            'scheduleName' => 'wawancara Asisten',
            'scheduleDate' => $validated['tanggalWawancaraAsisten'],
            'registrationId' => $registration->id,
        ]);

        Schedule::create([
            'scheduleName' => 'wawancara Dosen',
            'scheduleDate' => $validated['tanggalWawancaraDosen'],
            'registrationId' => $registration->id,
        ]);

        return redirect()->route('kelola.jadwal')->with('success', 'Schedules added successfully.');
    }

    // public function edit($id)
    // {
    //     $schedule = schedule::findOrFail($id);
    //     return view('schedules.edit', compact('schedule'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'tanggal' => 'required|date',
    //     ]);
    //     $schedule = schedule::findOrFail($id);

    //     $schedule->update([
    //         'tanggal' => $request->tanggal,
    //     ]);

    //     return redirect()->route('schedule.index')->with('success', 'Jadwal berhasil diperbarui.');
    // }
}
