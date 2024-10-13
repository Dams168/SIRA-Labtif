<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Models\information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $information = information::first();
        return view('admin.information.index', compact('information'));
    }

    public function create()
    {
        return view('admin.information.create');
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'tglOpenRecruitment' => 'required|date',
            'tglClosedRecruitment' => 'required|date',
            'tglTestTulis' => 'required|date',
            'tglWawancaraAsisten' => 'required|date',
            'tglWawancaraDosen' => 'required|date',
            'tglPengumumanHasil' => 'required|date',
        ]);

        $information = information::updateOrCreate(
            ['id' => 1],
            [
                'tglOpenRecruitment' => $validated['tglOpenRecruitment'],
                'tglClosedRecruitment' => $validated['tglClosedRecruitment'],
                'tglTestTulis' => $validated['tglTestTulis'],
                'tglWawancaraAsisten' => $validated['tglWawancaraAsisten'],
                'tglWawancaraDosen' => $validated['tglWawancaraDosen'],
                'tglPengumumanHasil' => $validated['tglPengumumanHasil'],
            ]
        );

        return redirect()->route('kelola.informasi')->with('success', 'Data informasi berhasil disimpan.');
    }
}
