<?php

namespace App\Http\Controllers;

use App\Models\registration;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $registration = registration::where('userId', Auth::id())->first();
        return view('home', compact('registration'));
    }
}
