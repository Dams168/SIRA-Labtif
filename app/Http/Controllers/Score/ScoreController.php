<?php

namespace App\Http\Controllers\Score;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\result;
use App\Models\test;
use App\Models\testDetail;
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
            'psikotest' => 'required|numeric|min:0|max:100',
            'umum' => 'required|numeric|min:0|max:100',
            'minatan' => 'required|numeric|min:0|max:100',
            'praktek' => 'required|numeric|min:0|max:100',
            'mengajar' => 'required|numeric|min:0|max:100',
            'pengenalanDiri' => 'required|numeric|min:0|max:100',
            'dosen1' => 'required|numeric|min:0|max:100',
            'dosen2' => 'required|numeric|min:0|max:100',
            'dosen3' => 'required|numeric|min:0|max:100',
            'dosen4' => 'required|numeric|min:0|max:100',
            'result' => 'nullable|in:Diterima,Ditolak,Menunggu',
        ]);

        $registration = Registration::findOrFail($request->input('registrationId'));

        $testTulis = ($request->input('psikotest') + $request->input('umum') + $request->input('minatan') + $request->input('praktek')) / 4;
        $wawancaraAsisten = ($request->input('mengajar') + $request->input('pengenalanDiri')) / 2;
        $wawancaraDosen = ($request->input('dosen1') + $request->input('dosen2') + $request->input('dosen3') + $request->input('dosen4')) / 4;

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

        testDetail::updateOrCreate(
            ['testId' => $test->id],
            [
                'psikotest' => $request->input('psikotest'),
                'umum' => $request->input('umum'),
                'minatan' => $request->input('minatan'),
                'praktek' => $request->input('praktek'),
                'mengajar' => $request->input('mengajar'),
                'pengenalanDiri' => $request->input('pengenalanDiri'),
                'dosen1' => $request->input('dosen1'),
                'dosen2' => $request->input('dosen2'),
                'dosen3' => $request->input('dosen3'),
                'dosen4' => $request->input('dosen4'),
            ]
        );

        Result::updateOrCreate(
            ['testId' => $test->id],
            [
                'finalScore' => $finalScore,
                'result' => $request->input('result'),
            ]
        );

        $notification = [
            'message' => 'Data nilai berhasil disimpan.',
            'alert-type' => 'success'
        ];

        return redirect()->route('kelola.nilai')->with($notification);
    }
}
