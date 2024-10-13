<?php

namespace App\Http\Controllers\Score;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\test;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $registrations = Registration::where('status', 'Diterima')->get();;
        $tests = test::all();
        return view('admin.score.index', compact('registrations', 'tests'));
    }

    public function create($registrationId)
    {
        $registration = Registration::with('test')->find($registrationId);
        return view('admin.score.create', compact('registration'));
    }

    public function storeOrUpdateAll(Request $request)
    {
        $registration = Registration::find($request->registrationId);

        $validated = $request->validate([
            'testTulis' => 'required|numeric',
            'wawancaraAsisten' => 'required|numeric',
            'wawancaraDosen' => 'required|numeric',
            'registrationId' => 'required|exists:registrations,id',
        ]);

        $test = Test::updateOrCreate(
            ['registrationId' => $request->registrationId],
            [
                'testTulis' => $request->testTulis,
                'wawancaraAsisten' => $request->wawancaraAsisten,
                'wawancaraDosen' => $request->wawancaraDosen,
            ]
        );

        return redirect()->route('kelola.nilai')->with('success', 'Data nilai berhasil disimpan.');
    }
}
