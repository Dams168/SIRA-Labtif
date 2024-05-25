<?php

namespace App\Http\Controllers\Kegiatanku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatankuController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $registration = $user->registration;
        return view('users.kegiatanku.index', compact('registration'));
    }
}
