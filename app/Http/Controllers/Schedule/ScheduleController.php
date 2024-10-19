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
        $registrations = Registration::with('schedules')->where('status', 'Diterima')->get();
        return view('admin.jadwal.index', compact('registrations'));
    }

    public function create()
    {
        $registration = registration::all();
        return view('admin.jadwal.setting', compact('registration'));
    }

    public function storeOrUpdateAll(Request $request)
    {
        $request->validate([
            'tanggalTestTulis' => 'required|date',
            'tanggalWawancaraAsisten' => 'required|date',
            'tanggalWawancaraDosen' => 'required|date',
        ]);

        $registrations = Registration::where('status', 'Diterima')->get();

        foreach ($registrations as $registration) {
            $schedulesData = [
                'Test Tulis' => $request->input('tanggalTestTulis'),
                'Wawancara Asisten' => $request->input('tanggalWawancaraAsisten'),
                'Wawancara Dosen' => $request->input('tanggalWawancaraDosen'),
            ];

            foreach ($schedulesData as $scheduleName => $scheduleDate) {
                $schedule = Schedule::updateOrCreate(
                    [
                        'registrationId' => $registration->id,
                        'scheduleName' => $scheduleName
                    ],
                    [
                        'scheduleDate' => $scheduleDate
                    ]
                );
            }
        }

        $notification = array(
            'message' => 'Jadwal berhasil diatur untuk semua pendaftar yang diterima.',
            'alert-type' => 'success'
        );

        return redirect()->route('kelola.jadwal')->with($notification);
    }
}
