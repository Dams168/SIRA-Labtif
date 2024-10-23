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
            'name' => 'required|max:255',
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

        $notification = array(
            'message' => 'Registration successful',
            'alert-type' => 'success'
        );

        if (Auth::user()->registration) {
            Auth::user()->registration->update($validated);
            return redirect()->route('file.create', ['registration' => Auth::user()->registration->id])->with($notification);
        } else {
            $registration = registration::create($validated);
            return redirect()->route('file.create', ['registration' => $registration->id])->with($notification);
        }
    }
}
