@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Dashboard</h2>
            <div class="relative overflow-x-auto">
                <div class="flex flex-row gap-4">
                    <div class="w-1/3 px-4">
                        <div class="bg-red-500 rounded-lg shadow-lg p-6 text-white text-sm leading-tight">
                            <h5 class="text-lg font-normal mb-2">Mahasiswa Yang belum divalidasi :</h5>
                            <p class="text-xl font-semibold text-end">{{ $totalPending }}</p>
                        </div>
                    </div>
                    <div class="w-1/3 px-4">
                        <div class="bg-emerald-500 rounded-lg shadow-lg p-6 text-white text-sm leading-tight">
                            <h5 class="text-lg font-normal mb-2">Mahasiswa yang sudah divalidasi :</h5>
                            <p class="text-xl font-semibold text-end">{{ $totalValidated }}</p>
                        </div>
                    </div>
                    <div class="w-1/3 px-4">
                        <div class="bg-sky-500 rounded-lg shadow-lg p-6 text-white text-sm leading-tight">
                            <h5 class="text-lg font-normal mb-2">Jumlah Mahasiswa yang Daftar :</h5>
                            <p class="text-xl font-semibold text-end">{{ $totalRegistrations }}</p>
                        </div>
                    </div>
                </div>
                <div class="min-w-full inline-block align-middle mt-10">
                    <table class="w-full text-sm text-left text-gray-400 bg-gray-900">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                            <tr>
                                <th scope="col" class="px-3 py-3">No</th>
                                <th scope="col" class="px-3 py-3">Nama</th>
                                <th scope="col" class="px-3 py-3">Kelas</th>
                                <th scope="col" class="px-3 py-3">Matkul Minat</th>
                                <th scope="col" class="px-3 py-3">Status Pendaftaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr class="text-center bg-gray-800 border-b border-gray-700">
                                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4">{{ $registration->name }}</td>
                                    <td class="py-2 px-4">{{ $registration->class }} - {{ $registration->period }}</td>
                                    <td class="py-2 px-4">{{ $registration->course->name }}</td>
                                    <td class="py-2 px-4">{{ $registration->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


@endsection
