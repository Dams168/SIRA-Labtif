@extends('layouts.user.app')

@section('title', 'Result - Accepted')

@section('content')
    <section
        class="bg-gradient-to-r from-blue-900 via-gray-900 to-gray-900 min-h-screen flex items-center justify-center py-8 px-4">
        <div class="max-w-screen-md w-full bg-gray-800 rounded-lg shadow-lg p-8 sm:p-12 text-center">
            <img src="{{ asset('assets/images/result/acc.png') }}" alt="Success Image" class="w-48 sm:w-72 mx-auto mb-6">

            <h1 class="text-white text-2xl sm:text-4xl font-extrabold mb-4">
                SELAMAT, KAMU TERPILIH SEBAGAI ASISTEN LABORATORIUM
            </h1>

            <p class="text-gray-300 text-lg sm:text-xl mb-6">
                Dengan Nilai Akhir: <span class="text-blue-500 font-bold">{{ $result->finalScore }}</span>
            </p>

            <p class="text-gray-300 mb-6">
                Terima kasih telah mendaftar sebagai asisten laboratorium. Silahkan cek whatsapp kamu secara berkala untuk
                informasi lebih
                lanjut.
            </p>

            <x-primary-button tag="a" href="{{ route('kegiatanku', $registration->id) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                Kegiatanku
            </x-primary-button>
        </div>
    </section>
@endsection
