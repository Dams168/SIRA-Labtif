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

            {{-- <p class="text-gray-300 text-lg sm:text-xl mb-6">
                Dengan Nilai Akhir: <span class="text-blue-500 font-bold">{{ $result->finalScore }}</span>
            </p> --}}

            <p class="text-gray-300 mb-6">
                Terima kasih telah mendaftar sebagai asisten laboratorium. Silahkan cek whatsapp kamu secara berkala untuk
                informasi lebih lanjut.
            </p>

            <h4 class="text-white text-sm sm:text-xl font-extrabold mb-4">Daftar Mahasiswa Yang Diterima Menjadi Asisten
                Laboratorium</h4>
            <table class="w-full text-sm text-left text-gray-400 bg-gray-900">
                <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                    <tr>
                        <th scope="col" class="px-3 py-3">No</th>
                        <th scope="col" class="px-3 py-3">Nama</th>
                        <th scope="col" class="px-3 py-3">Kelas</th>
                        <th scope="col" class="px-3 py-3">Hasil Rekrutmen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                        <tr class="text-center bg-gray-800 border-b border-gray-700">
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $registration->name }}</td>
                            <td class="py-2 px-4">{{ $registration->class }} - {{ $registration->period }}</td>
                            <td class="py-2 px-4">{{ $registration->test->result->result ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <x-primary-button tag="a" href="{{ route('kegiatanku', $registration->id) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                Kegiatanku
            </x-primary-button>
        </div>
    </section>
@endsection
