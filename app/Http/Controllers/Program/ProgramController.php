<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\registration;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->registration) {
            $registration = Auth::user()->registration;
        } else {
            $registration = null;
        }
        $courses = Course::all();

        $images = [
            1 => 'assets/images/program/sd.jpg',
            2 => 'assets/images/program/jarkom.jpg',
            3 => 'assets/images/program/pbo.jpg',
            4 => 'assets/images/program/multi.jpg',
            5 => 'assets/images/program/pwd.jpg',
        ];

        $descriptions = [
            1 => 'Ini Struktur Data',
            2 => 'Ini Jaringan Komputer',
            3 => 'Ini Pemrograman Berorientasi Objek',
            4 => 'Ini Multimedia',
            5 => 'Ini Pemrograman Web',
        ];

        foreach ($courses as $course) {
            $course->image = $images[$course->id] ?? 'assets/images/bg-hero.jpeg';
            $course->description = $descriptions[$course->id] ?? 'Default description';
        }


        return view('users.program.index', compact('courses', 'registration'));
    }

    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('users.program.registration', compact('course'));
    }

    public function store(Request $request, string $id)
    {
        $course = Course::find($id);
        if (!$course) {
            return redirect()->back()->withErrors(['course' => 'Course not found']);
        }

        $validated = $request->validate([
            'npm' => 'required|max:10|unique:registrations,npm',
            'class' => 'required',
            'period' => 'required',
            'phone' => 'required|max:13|unique:registrations,phone',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validated['userId'] = Auth::id();
        $validated['courseId'] = $course->id;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->storeAs(
                'public/photo_profile',
                'photo_profile_' . Auth::user()->name . '.' . $request->file('photo')->extension()
            );
            $validated['photo'] = basename($path);
        }

        $registration = registration::create($validated);
        return redirect()->route('file.create', ['registration' => $registration->id])->with('success', 'Registration successful');
    }
}
