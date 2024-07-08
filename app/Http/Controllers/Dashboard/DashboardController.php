<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $registrations = registration::all();
        return view('admin.dashboard.index', compact('registrations'));
    }
}
