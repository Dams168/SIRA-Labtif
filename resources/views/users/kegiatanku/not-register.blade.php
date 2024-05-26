@extends('layouts.user.app')

@section('title', 'Not Registered')

@section('content')
    <section class="bg-gray-900 antialiased">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6 flex flex-col items-center">
            <img src="{{ asset('assets/images/validasi/no-registration.png') }}" alt="Descriptive Alt Text"
                class="w-full max-w-sm mb-4">

            <!-- Text -->
            <h1 class="text-gray-200 text-center mb-4 text-3xl font-extrabold">
                Tidak ada Pendaftaran
            </h1>

            <p class="text-gray-200 text-center mb-4">
                Kamu belum mendaftar kegiatan apapun. Yuk, segera daftar kegiatan yang kamu inginkan!
            </p>

            <!-- Button -->
            <x-primary-button tag="a" href="{{ route('program') }}">Program</x-primary-button>
        </div>
    </section>

@endsection
