@extends('layouts.admin.app')

@section('title', 'Kelola Informasi')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Kelola Informasi</h2>
            <div class="relative overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <x-primary-button tag="a" href="{{ route('informasi.create') }}">
                        Pengaturan Informasi
                    </x-primary-button>
                    <table class="w-full text-sm text-left text-gray-400 bg-gray-900">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                            <tr>
                                <th scope="col" class="px-3 py-3">Tanggal Open Recruitment</th>
                                <th scope="col" class="px-3 py-3">Tanggal Close Recruitment</th>
                                <th scope="col" class="px-3 py-3">Tanggal Test Tulis Dan Praktik</th>
                                <th scope="col" class="px-3 py-3">Tanggal Wawancara Asisten</th>
                                <th scope="col" class="px-3 py-3">Tanggal Wawancara Dosen</th>
                                <th scope="col" class="px-3 py-3">Tanggal Pengumuman Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center bg-gray-800 border-b border-gray-700">
                                <td class="py-2 px-4">
                                    {{ \Carbon\Carbon::parse($information->tglOpenRecruitment)->locale('id')->translatedFormat('d F Y') ?? 'TBD' }}
                                </td>
                                <td class="py-2 px-4">
                                    {{ \Carbon\Carbon::parse($information->tglClosedRecruitment)->locale('id')->translatedFormat('d F Y') ?? 'TBD' }}
                                </td>
                                <td class="py-2 px-4">
                                    {{ \Carbon\Carbon::parse($information->tglTestTulis)->locale('id')->translatedFormat('d F Y') ?? 'TBD' }}
                                </td>
                                <td class="py-2 px-4">
                                    {{ \Carbon\Carbon::parse($information->tglWawancaraAsisten)->locale('id')->translatedFormat('d F Y') ?? 'TBD' }}
                                </td>
                                <td class="py-2 px-4">
                                    {{ \Carbon\Carbon::parse($information->tglWawancaraDosen)->locale('id')->translatedFormat('d F Y') ?? 'TBD' }}
                                </td>
                                <td class="py-2 px-4">
                                    {{ \Carbon\Carbon::parse($information->tglPengumumanHasil)->locale('id')->translatedFormat('d F Y') ?? 'TBD' }}
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
