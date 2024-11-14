<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function accepted()
    {
        // $userId = Auth::user()->id;

        // $result = User::whereHas('registration.test.result', function ($query) {
        //     $query->where('result', 'Diterima');
        // })->get();


        $registrations = registration::whereHas('test.result', function ($query) {
            $query->where('result', 'Diterima');
        })->get();
        return view('users.result.accepted', compact('registrations'));
    }

    public function rejected()
    {
        // $result = result::where('result', 'Ditolak')->get()->first();

        $registrations = registration::whereHas('test.result', function ($query) {
            $query->where('result', 'Diterima');
        })->get();

        return view('users.result.rejected', compact('registrations'));
    }
}
