@extends('layouts.user.app')

@section('title', 'Registration')

@section('content')
    <section class="bg-gray-900 antialiased p-6">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-3xl tracking-tight font-bold text-white">Form Daftar Asisten - {{ $course->name }}</h2>
            </div>
            <form method="POST" action="{{ route('registration.store', $course->id) }}" enctype="multipart/form-data"
                class="mt-6 space-y-6">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nama</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            placeholder="Nama" value="{{ old('name') }}" required />
                        @error('name')
                            <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="npm" class="block mb-2 text-sm font-medium text-white">NPM</label>
                        <input type="text" id="npm" name="npm"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            placeholder="1234567891" value="{{ old('npm') }}" required />
                        @error('npm')
                            <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-white">No Hp</label>
                        <input type="tel" id="phone" name="phone"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            placeholder="081234567899" value="{{ old('phone') }}" required />
                        @error('phone')
                            <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="class" class="block mb-2 text-sm font-medium text-white">Kelas</label>
                        <input type="text" id="class" name="class"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            placeholder="IF-A" value="{{ old('class') }}" required />
                        @error('class')
                            <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="period" class="block mb-2 text-sm font-medium text-white">Angkatan</label>
                        <select id="period" name="period"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            required>
                            <option value="" disabled selected>Pilih angkatan</option>
                            <option value="2021" {{ old('period') == '2021' ? 'selected' : '' }}>2021</option>
                            <option value="2022" {{ old('period') == '2022' ? 'selected' : '' }}>2022</option>
                            <option value="2023" {{ old('period') == '2023' ? 'selected' : '' }}>2023</option>
                        </select>
                        @error('period')
                            <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-white" for="photo">Upload Photo</label>
                        <input name="photo"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            aria-describedby="file_input_help" id="photo" type="file" accept=".png, .jpg, .jpeg">
                        <p class="mt-1 text-sm text-gray-300" id="photo">PNG, JPG, or JPEG (MAX. 2048KB).</p>
                        @error('photo')
                            <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Next</button>
            </form>
        </div>
    </section>
@endsection
