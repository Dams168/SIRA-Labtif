<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function accepted()
    {
        $result = result::where('result', 'Diterima')->get()->first();

        $registrations = Registration::whereHas('test.result', function ($query) {
            $query->where('result', 'Diterima');
        })->get();
        return view('users.result.accepted', compact('result', 'registrations'));
    }

    public function rejected()
    {
        $result = result::where('result', 'Ditolak')->get()->first();

        $registrations = Registration::whereHas('test.result', function ($query) {
            $query->where('result', 'Diterima');
        })->get();

        return view('users.result.rejected', compact('result',  'registrations'));
    }
}
