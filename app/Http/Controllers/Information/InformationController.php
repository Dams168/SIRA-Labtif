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
            'tglOpenRecruitment' => 'nullable|date',
            'tglClosedRecruitment' => 'nullable|date',
            'tglPraRecruitment' => 'nullable|date',
            'tglProsesAwal' => 'nullable|date',
            'tglProsesAkhir' => 'nullable|date',
            'tglPengumumanHasil' => 'nullable|date',
        ]);

        $information = information::updateOrCreate(
            ['id' => 1],
            [
                'tglOpenRecruitment' => $validated['tglOpenRecruitment'],
                'tglClosedRecruitment' => $validated['tglClosedRecruitment'],
                'tglPraRecruitment' => $validated['tglPraRecruitment'],
                'tglProsesAwal' => $validated['tglProsesAwal'],
                'tglProsesAkhir' => $validated['tglProsesAkhir'],
                'tglPengumumanHasil' => $validated['tglPengumumanHasil'],
            ]
        );

        $notification = array(
            'message' => 'Data informasi berhasil disimpan.',
            'alert-type' => 'success'
        );

        return redirect()->route('kelola.informasi')->with($notification);
    }
}
