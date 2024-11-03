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

        $totalRegistrations = registration::count();
        $totalPending = registration::where('status', 'Menunggu')->count();
        $totalValidated = registration::where('status', 'Diterima', 'Ditolak')->count();

        return view('admin.dashboard.index', compact('registrations', 'totalRegistrations',  'totalPending', 'totalValidated'));
    }
}
