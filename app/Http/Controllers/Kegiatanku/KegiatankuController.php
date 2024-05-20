<?php

namespace App\Http\Controllers\Kegiatanku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatankuController extends Controller
{
    public function index()
    {
        return view('users.kegiatanku.index');
    }
}
