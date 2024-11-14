<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\schedule;
use Barryvdh\DomPDF\Facade\Pdf;
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
            'jumlahRuanganTestTulis' => 'required|integer|min:1',
            'tanggalWawancaraAsisten' => 'required|date',
            'jumlahRuanganWawancaraAsisten' => 'required|integer|min:1',
            'tanggalWawancaraDosen' => 'required|date',
            'jumlahRuanganWawancaraDosen' => 'required|integer|min:1',
        ]);

        $registrations = Registration::where('status', 'Diterima')->get();
        $totalRegistrations = $registrations->count();

        $jumlahRuanganTestTulis = $request->input('jumlahRuanganTestTulis');
        $jumlahRuanganWawancaraAsisten = $request->input('jumlahRuanganWawancaraAsisten');
        $jumlahRuanganWawancaraDosen = $request->input('jumlahRuanganWawancaraDosen');

        if (
            $jumlahRuanganTestTulis > $totalRegistrations ||
            $jumlahRuanganWawancaraAsisten > $totalRegistrations ||
            $jumlahRuanganWawancaraDosen > $totalRegistrations
        ) {
            return redirect()->back()->withErrors(['error' => 'Jumlah ruangan tidak boleh lebih banyak dari jumlah peserta.']);
        }

        foreach ($registrations as $index => $registration) {
            $schedulesData = [
                'Test Tulis' => [
                    'date' => $request->input('tanggalTestTulis'),
                    'roomCount' => $jumlahRuanganTestTulis,
                ],
                'Wawancara Asisten' => [
                    'date' => $request->input('tanggalWawancaraAsisten'),
                    'roomCount' => $jumlahRuanganWawancaraAsisten,
                ],
                'Wawancara Dosen' => [
                    'date' => $request->input('tanggalWawancaraDosen'),
                    'roomCount' => $jumlahRuanganWawancaraDosen,
                ],
            ];

            foreach ($schedulesData as $scheduleName => $data) {
                $roomIndex = $index % $data['roomCount'];
                $roomName = 'Labkom ' . ($roomIndex + 1);

                Schedule::updateOrCreate(
                    [
                        'registrationId' => $registration->id,
                        'scheduleName' => $scheduleName
                    ],
                    [
                        'scheduleDate' => $data['date'],
                        'room' => $roomName
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

    public function printSchedule()
    {
        $registrations = Registration::with('schedules')->where('status', 'Diterima')->get();
        $pdf = Pdf::loadView('admin.jadwal.print', compact('registrations'))->setPaper('a4', 'potrait');
        return $pdf->download('Jadwal Rekrutmen.pdf');
    }
}
