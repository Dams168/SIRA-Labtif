@extends('layouts.admin.app')

@section('title', 'Kelola Nilai')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Kelola Nilai</h2>
            <div class="relative overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <table class="w-full text-sm text-left text-gray-400 bg-gray-900">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                            <tr>
                                <th scope="col" class="px-3 py-3">No</th>
                                <th scope="col" class="px-3 py-3">Nama</th>
                                <th scope="col" class="px-3 py-3">Kelas</th>
                                <th scope="col" class="px-3 py-3">Matkul Minat</th>
                                <th scope="col" class="px-3 py-3">Nilai Test Tulis Dan Praktik</th>
                                <th scope="col" class="px-3 py-3">Nilai Wawancara Asisten</th>
                                <th scope="col" class="px-3 py-3">Nilai Wawancara Dosen</th>
                                <th scope="col" class="px-3 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr class="text-center bg-gray-800 border-b border-gray-700">
                                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4">{{ $registration->user->name }}</td>
                                    <td class="py-2 px-4">{{ $registration->class }} - {{ $registration->period }}</td>
                                    <td class="py-2 px-4">{{ $registration->course->name }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testTulis ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->wawancaraAsisten ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->wawancaraDosen ?? '-' }}</td>
                                    <td class="py-2 px-4">
                                        <x-primary-button tag="a"
                                            href="{{ route('score.create', $registration->id) }}"
                                            class="text-blue-500 hover:underline">Edit</x-primary-button>
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
