<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\result;
use App\Models\schedule;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $registrations = Registration::orderBy('period', 'asc')->get();
        return view('koordinator.dashboard.index', compact('registrations'));
    }

    public function showDetail($id)
    {
        $registration = Registration::where('id', $id)->first();
        $schedules = schedule::where('registrationId', $id)->get();

        return view('koordinator.dashboard.detail', compact('registration', 'schedules'));
    }

    public function printPdf()
    {
        $registrations = Registration::orderBy('period', 'asc')->get()->where('status', 'Diterima');
        $results = result::orderBy('finalScore', 'asc')->get()->where('result', 'Diterima');

        $pdf = Pdf::loadView('koordinator.dashboard.print', compact('registrations', 'results'))->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Rekrutmen.pdf');
    }
}
