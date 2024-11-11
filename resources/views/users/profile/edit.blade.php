@extends('layouts.user.app')

@section('title', 'User Profile')

@section('content')
    <section class="bg-gray-900 antialiased">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">

            <div id="editProfile" class="p-6 bg-gray-800 border border-gray-700 rounded-lg">
                <h3 class="text-xl font-semibold text-white mb-4">Edit Profil</h3>
                <form id="editProfileForm" action="{{ route('userprofile.update', $registration->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="text-white" for="name">Nama:</label>
                            <input type="text" id="name" name="name" value="{{ $registration->name }}"
                                class="w-full p-2 rounded-md border border-gray-600 bg-gray-700 text-white" required>
                        </div>
                        <div>
                            <label class="text-white" for="npm">NPM:</label>
                            <input type="text" id="npm" name="npm" value="{{ $registration->npm }}"
                                class="w-full p-2 rounded-md border border-gray-600 bg-gray-700 text-white" required>
                        </div>
                        <div>
                            <label class="text-white" for="phone">No Telepon:</label>
                            <input type="text" id="phone" name="phone" value="{{ $registration->phone }}"
                                class="w-full p-2 rounded-md border border-gray-600 bg-gray-700 text-white" required>
                        </div>
                        <div>
                            <label class="text-white" for="class">Kelas:</label>
                            <input type="text" id="class" name="class" value="{{ $registration->class }}"
                                class="w-full p-2 rounded-md border border-gray-600 bg-gray-700 text-white" required>
                        </div>
                        <div>
                            <label class="text-white" for="period">Angkatan:</label>
                            <input type="number" id="period" name="period" value="{{ $registration->period }}"
                                class="w-full p-2 rounded-md border border-gray-600 bg-gray-700 text-white" min="2021"
                                max="{{ date('Y') }}" value="{{ old('period') }}"required>
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-white" for="photo">Upload Photo</label>
                            <input name="photo"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                aria-describedby="file_input_help" id="photo" type="file" accept=".png, .jpg, .jpeg"
                                value="{{ $registration->photo }}">
                            <p class="mt-1 text-sm text-gray-300" id="photo">PNG, JPG, or JPEG (MAX. 2048KB).</p>
                            @error('photo')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan
                                Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
