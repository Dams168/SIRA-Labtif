<?php

namespace App\Http\Controllers\Score;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\result;
use App\Models\test;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $registrations = Registration::where('status', 'Diterima')->get();;
        $tests = test::all();
        $results = result::first();
        return view('admin.score.index', compact('registrations', 'tests', 'results'));
    }

    public function create($registrationId)
    {
        $registration = Registration::with('test')->find($registrationId);
        return view('admin.score.create', compact('registration'));
    }

    public function storeOrUpdateAll(Request $request)
    {
        $request->validate([
            'testTulis' => 'required|numeric|min:0|max:100',
            'wawancaraAsisten' => 'required|numeric|min:0|max:100',
            'wawancaraDosen' => 'required|numeric|min:0|max:100',
            'result' => 'nullable|in:Diterima,Ditolak,Menunggu',
        ]);

        $registration = Registration::findOrFail($request->input('registrationId'));

        $testTulis = $request->input('testTulis');
        $wawancaraAsisten = $request->input('wawancaraAsisten');
        $wawancaraDosen = $request->input('wawancaraDosen');

        $finalScore = ($testTulis + $wawancaraAsisten + $wawancaraDosen) / 3;

        $test = $registration->test;
        if (!$test) {
            $test = new Test();
            $test->registrationId = $registration->id;
        }
        $test->testTulis = $testTulis;
        $test->wawancaraAsisten = $wawancaraAsisten;
        $test->wawancaraDosen = $wawancaraDosen;
        $test->save();

        $result = result::updateOrCreate(
            ['testId' => $test->id],
            [
                'finalScore' => $finalScore,
                'result' => $request->input('result'),
            ]
        );

        $notification = array(
            'message' => 'Data nilai berhasil disimpan.',
            'alert-type' => 'success'
        );

        return redirect()->route('kelola.nilai')->with($notification);
    }
}
