<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\files;
use App\Models\registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function create($registrationId)
    {
        $registration = registration::findOrFail($registrationId);
        return view('users.program.file', compact('registration'));
    }

    public function store(Request $request, string $id)
    {
        $registration = registration::find($id);
        if (!$registration) {
            return redirect()->back()->withErrors(['registration' => 'Registration not found']);
        }

        $validated = $request->validate([
            'fileCV' => 'required|file|mimes:pdf|max:2048',
            'fileSuratLamaran' => 'required|file|mimes:pdf|max:2048',
            'fileCertificate' => 'required|file|mimes:pdf|max:2048',
            'fileFHS' => 'required|file|mimes:pdf|max:2048',
            'fileSuratRekomendasi' => 'required|file|mimes:pdf|max:2048',
            'fileProductImages' => 'required|file|mimes:pdf|max:2048',
            'fileProduct' => 'required|url',
        ]);

        $username = Auth::user()->name;
        $folderPath = 'public/uploads/' . $username;

        foreach ($validated as $key => $value) {
            if ($request->hasFile($key)) {
                $originalName = pathinfo($request->file($key)->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . $username;
                $path = $request->file($key)->storeAs($folderPath, $fileName);
                $validated[$key] = $path;
            }
        }

        files::create(array_merge($validated, ['registrationId' => $registration->id]));

        return redirect()->route('kegiatanku')->with('success', 'File berhasil diupload');
    }

    public function show($registrationId)
    {
        $registration = Registration::findOrFail($registrationId);
        $courses = Course::all();
        $courseId = $registration->course->id;

        $images = [
            1 => 'assets/images/program/sd.jpg',
            2 => 'assets/images/program/jarkom.jpg',
            3 => 'assets/images/program/pbo.jpg',
            4 => 'assets/images/program/multi.jpg',
            5 => 'assets/images/program/pwd.jpg',
        ];

        foreach ($courses as $course) {
            $course->image = $images[$courseId] ?? 'assets/images/bg-hero.jpeg';
        }

        $course = $courses->where('id', $courseId)->first();
        $file = $registration->file;

        return view('users.validasi.index', compact('registration', 'courses', 'course', 'registrationId', 'file'));
    }

    public function update(Request $request, string $id)
    {
        $registration = registration::find($id);
        if (!$registration) {
            return redirect()->back()->withErrors(['registration' => 'Registration not found']);
        }

        $validated = $request->validate([
            'fileCV' => 'required|file|mimes:pdf|max:2048',
            'fileSuratLamaran' => 'required|file|mimes:pdf|max:2048',
            'fileCertificate' => 'required|file|mimes:pdf|max:2048',
            'fileFHS' => 'required|file|mimes:pdf|max:2048',
            'fileSuratRekomendasi' => 'required|file|mimes:pdf|max:2048',
            'fileProductImages' => 'required|file|mimes:pdf|max:2048',
            'fileProduct' => 'required|url',
        ]);

        $username = Auth::user()->name;
        $folderPath = 'public/uploads/' . $username;

        foreach ($validated as $key => $value) {
            if ($request->hasFile($key)) {
                $originalName = pathinfo($request->file($key)->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . $username;
                $path = $request->file($key)->storeAs($folderPath, $fileName);
                $validated[$key] = $path;
            }
        }
        files::where('id', $id)->update($validated);

        return redirect()->route('validasi', $registration->id)->with('success', 'Status berhasil diupdate');
    }
}
