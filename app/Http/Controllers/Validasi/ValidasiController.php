<?php

namespace App\Http\Controllers\Validasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function index()
    {
        return view('users.validasi.index');
    }
}
