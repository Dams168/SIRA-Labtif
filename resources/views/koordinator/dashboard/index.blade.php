@extends('layouts.koordinator.app')

@section('title', 'Dashboard')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Dashboard</h2>
            <x-primary-button tag="a" href="{{ route('koordinator.print') }}">
                Print to PDF
            </x-primary-button>
            <div class="relative overflow-x-auto">
                <div class="min-w-full inline-block align-middle mt-10">
                    <table class="w-full text-sm text-left text-gray-400 bg-gray-900">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                            <tr>
                                <th scope="col" class="px-3 py-3">No</th>
                                <th scope="col" class="px-3 py-3">Nama</th>
                                <th scope="col" class="px-3 py-3">Kelas</th>
                                <th scope="col" class="px-3 py-3">Matkul Minat</th>
                                <th scope="col" class="px-3 py-3">Status Pendaftaran</th>
                                <th scope="col" class="px-3 py-3">Hasil Rekrutmen</th>
                                <th scope="col" class="px-3 py-3">Aksi</th>
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
                                    <td class="py-2 px-4">{{ $registration->test->result->result ?? 'Menunggu' }}</td>
                                    <td>
                                        <x-primary-button tag="a"
                                            href="{{ route('koordinator.detail', $registration->id) }}">
                                            Lihat Detail
                                        </x-primary-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
