<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function accepted()
    {
        $result = result::where('result', 'Diterima')->get()->first();
        $registration = $result ? $result->test->registration : null;

        return view('users.result.accepted', compact('result', 'registration'));
    }

    public function rejected()
    {
        $result = result::where('result', 'Ditolak')->get()->first();

        $registration = $result ? $result->test->registration : null;
        return view('users.result.rejected', compact('result', 'registration'));
    }
}
