@extends('layouts.user.app')

@section('title', 'Result - Rejected')

@section('content')
    <section
        class="bg-gradient-to-b from-gray-800 via-gray-900 to-black min-h-screen flex items-center justify-center px-4 py-8">
        <div class="max-w-screen-md w-full bg-gray-800 rounded-lg shadow-lg p-8 sm:p-12 text-center">
            <img src="{{ asset('assets/images/result/reject.png') }}" alt="Result Rejected Image"
                class="w-48 sm:w-72 mx-auto mb-6">

            <h1 class="text-white text-2xl sm:text-3xl font-extrabold mb-4">
                Mohon Maaf, Kamu belum terpilih sebagai Asisten Laboratorium
            </h1>

            <p class="text-gray-300 text-lg sm:text-xl mb-6">
                Dengan Nilai Akhir: <span class="text-red-500 font-bold">{{ $result->finalScore }}</span>
            </p>

            <p class="text-gray-300 mb-6">
                Terima kasih telah mendaftar sebagai asisten laboratorium. Tetap semangat dan jangan menyerah, kesempatan
                lain mungkin sedang menanti!
            </p>

            <x-primary-button tag="a" href="{{ route('kegiatanku', $registration->id) }}"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                Kegiatanku
            </x-primary-button>
        </div>
    </section>
@endsection
