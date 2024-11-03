@extends('layouts.koordinator.app')

@section('title', 'Dashboard')

@section('content')
    <section class="bg-gray-900 py-8 px-4">
        <div class="mx-auto max-w-screen-xl lg:py-8 lg:px-6">
            <div class="mb-6">
                <x-primary-button tag="a" href="{{ route('koordinator.dashboard') }}">
                    Kembali
                </x-primary-button>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-md p-6 flex flex-col md:flex-row items-center mb-6">
                <img src="{{ $registration->photo ? asset('storage/photo_profile/' . $registration->photo) : asset('assets/images/default_profil.jpg') }}"
                    alt="User Photo" class="w-32 h-32 rounded-full mb-4 md:mb-0 md:mr-6">
                <div>
                    <h2 class="text-xl font-bold mb-2 text-white">{{ $registration->name }}</h2>
                    <p class="text-gray-300"><strong>NPM:</strong> {{ $registration->npm }}</p>
                    <p class="text-gray-300"><strong>Kelas:</strong> {{ $registration->class }} {{ $registration->period }}
                    </p>
                    <p class="text-gray-300"><strong>Matkul Minat:</strong> {{ $registration->course->name }}</p>
                    <x-primary-button tag="a" href="{{ route('file.download', $registration->id) }}">
                        Download Semua Berkas
                    </x-primary-button>
                </div>
            </div>

            <div class="overflow-x-auto mb-6">
                <table class="w-full bg-gray-800 text-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="py-2 px-4 text-left">Nama Berkas</th>
                            <th class="py-2 px-4 text-left">Aksi</th>
                            <th class="py-2 px-4 text-center">Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (['fileCV', 'fileSuratLamaran', 'fileCertificate', 'fileFHS', 'fileSuratRekomendasi', 'fileProductImages', 'fileProduct'] as $fileField)
                            @if (!empty($registration->file->$fileField))
                                <tr class="border-b border-gray-600">
                                    <td class="py-2 px-4">{{ basename($registration->file->$fileField) }}</td>
                                    <td class="py-2 px-4">
                                        @if (filter_var($registration->file->$fileField, FILTER_VALIDATE_URL))
                                            <a href="{{ $registration->file->$fileField }}" target="_blank"
                                                class="text-blue-400 hover:underline">Link Product</a>
                                        @else
                                            <a href="{{ asset('storage/' . $registration->file->$fileField) }}"
                                                target="_blank" class="text-blue-400 hover:underline">Preview</a>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 text-center">
                                        <input type="checkbox" disabled
                                            {{ !empty($registration->file->verification) && $registration->file->verification->{$fileField . '_verified'} ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h2 class="text-2xl font-medium text-gray-300 mb-4">Jadwal</h2>
            <div class="overflow-x-auto mb-6">
                <table class="w-full bg-gray-800 text-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="px-6 py-3 text-start">Nama Test</th>
                            <th class="px-6 py-3 text-start">Tanggal Test</th>
                            <th class="px-6 py-3 text-start">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            <tr class="border-b border-gray-600 bg-gray-800">
                                <td class="px-6 py-4">{{ ucwords(str_replace('_', ' ', $schedule->scheduleName)) }}</td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($schedule->scheduleDate)->locale('id')->translatedFormat('l, d F Y') }}
                                </td>
                                <td class="px-6 py-4">{{ $schedule->room }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @foreach (['Nilai Test Tulis Dan Praktik', 'Nilai Wawancara Asisten', 'Nilai Wawancara Dosen'] as $testSection)
                <h3 class="text-xl font-semibold text-gray-300 mt-8">{{ $testSection }}</h3>
                <div class="overflow-x-auto">
                    <table class="w-full bg-gray-800 text-gray-200 rounded-lg shadow-md text-center">
                        <thead class="bg-gray-700 text-gray-400">
                            <tr>
                                @if ($testSection == 'Nilai Test Tulis Dan Praktik')
                                    <th class="px-3 py-3">Psikotes</th>
                                    <th class="px-3 py-3">Umum</th>
                                    <th class="px-3 py-3">Minatan</th>
                                    <th class="px-3 py-3">Praktek</th>
                                    <th class="px-3 py-3">Nilai Akhir</th>
                                @elseif ($testSection == 'Nilai Wawancara Asisten')
                                    <th class="px-3 py-3">Kemampuan Mengajar</th>
                                    <th class="px-3 py-3">Pengenalan Diri & Motivasi</th>
                                    <th class="px-3 py-3">Nilai Akhir</th>
                                @else
                                    <th class="px-3 py-3">Dosen 1</th>
                                    <th class="px-3 py-3">Dosen 2</th>
                                    <th class="px-3 py-3">Dosen 3</th>
                                    <th class="px-3 py-3">Dosen 4</th>
                                    <th class="px-3 py-3">Nilai Akhir</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-800 border-b border-gray-700">
                                @if ($testSection == 'Nilai Test Tulis Dan Praktik')
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->psikotest ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->umum ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->minatan ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->praktek ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testTulis ?? '-' }}</td>
                                @elseif ($testSection == 'Nilai Wawancara Asisten')
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->mengajar ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->pengenalanDiri ?? '-' }}
                                    </td>
                                    <td class="py-2 px-4">{{ $registration->test->wawancaraAsisten ?? '-' }}</td>
                                @else
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->dosen1 ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->dosen2 ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->dosen3 ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testDetail->dosen4 ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->wawancaraDosen ?? '-' }}</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach


            <h2 class="text-2xl font-medium text-gray-300 mb-4">Hasil Akhir Rekrutmen</h2>
            <div class="space-y-6">
                <div class="overflow-x-auto">
                    <table class="w-full bg-gray-800 text-gray-200 rounded-lg shadow-md text-center">
                        <thead class="bg-gray-700 text-gray-400">
                            <tr>
                                <th class="px-3 py-3">Nilai Test Tulis & Praktik</th>
                                <th class="px-3 py-3">Nilai Wawancara Asisten</th>
                                <th class="px-3 py-3">Nilai Wawancara Dosen</th>
                                <th class="px-3 py-3">Nilai Akhir</th>
                                <th class="px-3 py-3">Hasil Rekrutmen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-800 border-b border-gray-700">
                                <td class="py-2 px-4">{{ $registration->test->testTulis ?? '-' }}</td>
                                <td class="py-2 px-4">{{ $registration->test->wawancaraAsisten ?? '-' }}</td>
                                <td class="py-2 px-4">{{ $registration->test->wawancaraDosen ?? '-' }}</td>
                                <td class="py-2 px-4">{{ $registration->test->result->finalScore ?? '-' }}</td>
                                <td class="py-2 px-4">{{ $registration->test->result->result ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
