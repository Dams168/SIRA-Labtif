<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\files;
use App\Models\fileVerification;
use App\Models\registration;
use App\Models\result;
use App\Models\schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;

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
            'fileProductImages' => 'required|file|mimes:pdf|max:2048',
            'fileProduct' => 'required|url',
        ]);

        $username = $registration->name;

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

        $notification = array(
            'message' => 'File berhasil diupload',
            'alert-type' => 'success'
        );

        return redirect()->route('kegiatanku', $registration->id)->with($notification);
    }

    public function show($registrationId)
    {
        $registration = Registration::findOrFail($registrationId);
        $courses = Course::all();
        $courseId = $registration->course->id;
        $schedules = schedule::where('registrationId', $registrationId)->get();
        $result = $registration->test->result ?? null;

        $course = $courses->where('id', $courseId)->first();
        $file = $registration->file;

        return view('users.kegiatanku.index', compact('registration', 'courses', 'course', 'registrationId', 'file', 'schedules', 'result'));
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
            'fileProductImages' => 'nullable|file|mimes:pdf|max:2048',
            'fileProduct' => 'nullable|url',
        ]);

        $username = Auth::user()->user->registration->name;
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

        $notification = array(
            'message' => 'File berhasil diupdate',
            'alert-type' => 'success'
        );

        return redirect()->route('kegiatanku', $registration->id)->with($notification);
    }



    // Admin
    public function index()
    {
        $registrations = registration::all();
        return view('admin.file.index', compact('registrations'));
    }

    public function showVerify($id)
    {
        $registration = Registration::with('file')->findOrFail($id);
        $courses = course::all();

        return view('admin.file.verify', compact('courses', 'registration'));
    }

    public function downloadZip($id)
    {
        $registration = Registration::findOrFail($id);
        $files = $registration->file;
        $username = $registration->name;

        $zip = new ZipArchive();
        $zipFileName = $username . '.zip';
        $zipFilePath = storage_path('app/public/uploads/' . $username . '/' . $zipFileName);

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            $zip->addFile(storage_path('app/public/' . $files->fileCV), $username . ' CV.pdf');
            $zip->addFile(storage_path('app/public/' . $files->fileSuratLamaran), $username . ' Surat Lamaran.pdf');
            $zip->addFile(storage_path('app/public/' . $files->fileCertificate), $username . ' Certificate.pdf');
            $zip->addFile(storage_path('app/public/' . $files->fileFHS), $username . ' FHS.pdf');
            $zip->addFile(storage_path('app/public/' . $files->fileProductImages), $username . ' Product Images.pdf');
            $zip->addFromString($username . ' Link Product.txt', $files->fileProduct);
            $zip->close();
        }

        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    public function verify(Request $request, $registrationId)
    {
        $validatedData = $request->validate([
            'verification' => 'nullable|array',
            'verification.fileCV' => 'nullable|boolean',
            'verification.fileSuratLamaran' => 'nullable|boolean',
            'verification.fileCertificate' => 'nullable|boolean',
            'verification.fileFHS' => 'nullable|boolean',
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

        // Konversi nilai 1 dari form ke boolean
        $fileVerification->fileCV_verified = isset($validatedData['verification']['fileCV']) ? (bool)$validatedData['verification']['fileCV'] : false;
        $fileVerification->fileSuratLamaran_verified = isset($validatedData['verification']['fileSuratLamaran']) ? (bool)$validatedData['verification']['fileSuratLamaran'] : false;
        $fileVerification->fileCertificate_verified = isset($validatedData['verification']['fileCertificate']) ? (bool)$validatedData['verification']['fileCertificate'] : false;
        $fileVerification->fileFHS_verified = isset($validatedData['verification']['fileFHS']) ? (bool)$validatedData['verification']['fileFHS'] : false;
        $fileVerification->fileProductImages_verified = isset($validatedData['verification']['fileProductImages']) ? (bool)$validatedData['verification']['fileProductImages'] : false;
        $fileVerification->fileProduct_verified = isset($validatedData['verification']['fileProduct']) ? (bool)$validatedData['verification']['fileProduct'] : false;
        $fileVerification->save();

        // simpan file yang tidak terverifikasi
        $unverifiedFiles = [];
        if (!$fileVerification->fileCV_verified) $unverifiedFiles[] = 'CV';
        if (!$fileVerification->fileSuratLamaran_verified) $unverifiedFiles[] = 'Surat Lamaran';
        if (!$fileVerification->fileCertificate_verified) $unverifiedFiles[] = 'Certificate';
        if (!$fileVerification->fileFHS_verified) $unverifiedFiles[] = 'FHS';
        if (!$fileVerification->fileProductImages_verified) $unverifiedFiles[] = 'Product Images';
        if (!$fileVerification->fileProduct_verified) $unverifiedFiles[] = 'Link File Product';

        if (empty($unverifiedFiles)) {
            $registration->status = 'Diterima';
            $registration->note = 'Selamat!!! Pendaftaran Anda Diterima silahkan cek secara berkala untuk informasi selanjutnya. Terima kasih telah mendaftar di rekrutmen ini :)';
        } else {
            $registration->status = 'Ditolak';
            $registration->note = 'Maaf, pendaftaran Anda ditolak. File yang perlu diperbaiki: ' . implode(', ', $unverifiedFiles) . '. Silahkan cek kembali file yang Anda upload. Terima kasih :)';
        }
        $registration->save();

        $notification = array(
            'message' => 'File berhasil diverifikasi',
            'alert-type' => 'success'
        );
        return redirect()->route('kelola.file')->with($notification);
    }
}
