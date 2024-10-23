<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $registration = registration::where('userId', $user->id)->first();

        return view('users.profile.index', compact('user', 'registration'));
    }

    public function edit(string $id)
    {
        // $user = auth()->user();
        // $registration = Registration::where('userId', $user->id)->first();
        $user = User::find($id);
        $registration = registration::where('userId', $user->id)->first();

        $editMode = true;
        return view('users.profile.edit', compact('user', 'registration', 'editMode'));
    }

    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $registration = registration::where('userId', $user->id)->first();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'npm' => 'required|string|max:15',
            'class' => 'required|string|max:15',
            'period' => 'required|string|max:15',
        ]);
        if ($request->hasFile('photo')) {
            if ($registration->photo) {
                Storage::delete('public/photo_profile/' . $registration->photo);
            }
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/photo_profile', $fileName);
            $validated['photo'] = $fileName;
        } else {
            $validated['photo'] = $registration->photo;
        }
        registration::where('userId', $user->id)->update($validated);

        $notification = array(
            'message' => 'Profile Berhasil Diperbarui',
            'alert-type' => 'success'
        );
        return redirect()->route('userprofile', $registration)->with($notification);
    }
}
