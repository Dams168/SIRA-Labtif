<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\files;
use App\Models\fileVerification;
use App\Models\registration;
use App\Models\schedule;
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

        foreach ($validated as $key => $value) {
            if ($request->hasFile($key)) {
                $originalName = pathinfo($request->file($key)->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . $username;
                $path = $request->file($key)->storeAs('uploads/' . $username, $fileName, 'public');
                $validated[$key] = $path;
            }
        }

        if ($registration->file) {
            $registration->file->update($validated);
        } else {
            files::create(array_merge($validated, ['registrationId' => $registration->id]));
        }

        return redirect()->route('kegiatanku', $registration->id)->with('success', 'File berhasil diupload');
    }

    public function show($registrationId)
    {
        $registration = Registration::findOrFail($registrationId);
        $courses = Course::all();
        $courseId = $registration->course->id;
        $schedules = schedule::where('registrationId', $registrationId)->get();

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

        return view('users.kegiatanku.index', compact('registration', 'courses', 'course', 'registrationId', 'file', 'schedules'));
    }

    public function update(Request $request, string $id)
    {
        $registration = Registration::find($id);
        if (!$registration) {
            return redirect()->back()->withErrors(['registration' => 'Registration not found']);
        }

        $validated = $request->validate([
            'fileCV' => 'nullable|file|mimes:pdf|max:2048',
            'fileSuratLamaran' => 'nullable|file|mimes:pdf|max:2048',
            'fileCertificate' => 'nullable|file|mimes:pdf|max:2048',
            'fileFHS' => 'nullable|file|mimes:pdf|max:2048',
            'fileSuratRekomendasi' => 'nullable|file|mimes:pdf|max:2048',
            'fileProductImages' => 'nullable|file|mimes:pdf|max:2048',
            'fileProduct' => 'nullable|url',
        ]);

        $username = Auth::user()->name;
        $fileData = [];

        foreach ($validated as $key => $value) {
            if ($request->hasFile($key)) {
                $originalName = pathinfo($request->file($key)->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . $username . '.' . $request->file($key)->getClientOriginalExtension();
                $path = $request->file($key)->storeAs('uploads/' . $username, $fileName, 'public');
                $fileData[$key] = $path;
            } else if ($request->input($key)) {
                $fileData[$key] = $request->input($key);
            }
        }

        $registration->status = 'Menunggu';
        $registration->note = null;
        $registration->save();

        Files::where('registrationId', $registration->id)->update($fileData);

        return redirect()->route('kegiatanku', $registration->id)->with('success', 'Status berhasil diupdate');
    }



    // Admin
    public function index()
    {
        $registrations = registration::all();
        $user = Auth::user();
        $files = files::all();
        $courses = course::all();
        return view('admin.file.index', compact('files', 'registrations', 'courses'));
    }

    public function showVerify($id)
    {
        $registration = Registration::with('file')->findOrFail($id);
        $courses = course::all();

        return view('admin.file.verify', compact('courses', 'registration'));
    }

    public function verify(Request $request, $registrationId)
    {
        $validatedData = $request->validate([
            'verification' => 'required|array',
            'verification.fileCV' => 'nullable|boolean',
            'verification.fileSuratLamaran' => 'nullable|boolean',
            'verification.fileCertificate' => 'nullable|boolean',
            'verification.fileFHS' => 'nullable|boolean',
            'verification.fileSuratRekomendasi' => 'nullable|boolean',
            'verification.fileProductImages' => 'nullable|boolean',
            'verification.fileProduct' => 'nullable|boolean',
        ]);

        $registration = Registration::with('file.verification')->find($registrationId);

        if (!$registration || !$registration->file) {
            return back()->with('error', 'File not found.');
        }

        $file = $registration->file;

        // Create or update the verification record
        $fileVerification = $file->verification ?: new FileVerification(['file_id' => $file->id]);

        // Convert "1" to boolean true and absent fields to false
        $fileVerification->fileCV_verified = isset($validatedData['verification']['fileCV']) ? (bool)$validatedData['verification']['fileCV'] : false;
        $fileVerification->fileSuratLamaran_verified = isset($validatedData['verification']['fileSuratLamaran']) ? (bool)$validatedData['verification']['fileSuratLamaran'] : false;
        $fileVerification->fileCertificate_verified = isset($validatedData['verification']['fileCertificate']) ? (bool)$validatedData['verification']['fileCertificate'] : false;
        $fileVerification->fileFHS_verified = isset($validatedData['verification']['fileFHS']) ? (bool)$validatedData['verification']['fileFHS'] : false;
        $fileVerification->fileSuratRekomendasi_verified = isset($validatedData['verification']['fileSuratRekomendasi']) ? (bool)$validatedData['verification']['fileSuratRekomendasi'] : false;
        $fileVerification->fileProductImages_verified = isset($validatedData['verification']['fileProductImages']) ? (bool)$validatedData['verification']['fileProductImages'] : false;
        $fileVerification->fileProduct_verified = isset($validatedData['verification']['fileProduct']) ? (bool)$validatedData['verification']['fileProduct'] : false;
        $fileVerification->save();

        $unverifiedFiles = [];
        if (!$fileVerification->fileCV_verified) $unverifiedFiles[] = 'CV';
        if (!$fileVerification->fileSuratLamaran_verified) $unverifiedFiles[] = 'Surat Lamaran';
        if (!$fileVerification->fileCertificate_verified) $unverifiedFiles[] = 'Certificate';
        if (!$fileVerification->fileFHS_verified) $unverifiedFiles[] = 'FHS';
        if (!$fileVerification->fileSuratRekomendasi_verified) $unverifiedFiles[] = 'Surat Rekomendasi';
        if (!$fileVerification->fileProductImages_verified) $unverifiedFiles[] = 'Product Images';
        if (!$fileVerification->fileProduct_verified) $unverifiedFiles[] = 'Link File Product';

        // Update the registration status and note based on verification
        if (empty($unverifiedFiles)) {
            $registration->status = 'Diterima';
            $registration->note = 'Selamat!!! Pendaftaran Anda Diterima silahkan cek secara berkala untuk informasi selanjutnya. Terima kasih telah mendaftar di rekrutmen ini :)';
        } else {
            $registration->status = 'Ditolak';
            $registration->note = 'Maaf, pendaftaran Anda ditolak. File yang perlu diperbaiki: ' . implode(', ', $unverifiedFiles) . '. Silahkan cek kembali file yang Anda upload. Terima kasih :)';
        }
        $registration->save();

        return redirect()->route('kelola.file')->with('success', 'File berhasil diverifikasi.');
    }




    // public function reject(Request $request, Registration $registration)
    // {
    //     $registration->update([
    //         'status' => 'Ditolak',
    //         'note' => $request->note,
    //     ]);

    //     return redirect()->route('kelola.file', $registration->id)->with('success', 'Pendaftaran telah ditolak.');
    // }

    // public function approve(Registration $registration)
    // {
    //     $registration->update([
    //         'status' => 'Diterima',
    //         'note' => 'Selamat!!! Pendaftaran Anda Diterima silahkan cek secara berkala untuk informasi selanjutnya. Terima kasih telah mendaftar di rekrutmen ini :)',
    //     ]);

    //     return redirect()->route('kelola.file')->with('success', 'Pendaftaran telah disetujui.');
    // }
}
