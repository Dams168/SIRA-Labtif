@extends('layouts.admin.app')

@section('title', 'Kelola Jadwal')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Kelola Jadwal</h2>
            <div class="relative overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <table class="w-full text-sm text-left text-gray-400 bg-gray-900">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                            <tr>
                                <th scope="col" class="px-3 py-3">No</th>
                                <th scope="col" class="px-3 py-3">Nama</th>
                                <th scope="col" class="px-3 py-3">NPM</th>
                                <th scope="col" class="px-3 py-3">Kelas</th>
                                <th scope="col" class="px-3 py-3">Angkatan</th>
                                <th scope="col" class="px-3 py-3">Matkul Minat</th>
                                <th scope="col" class="px-3 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $key => $registration)
                                @if ($registration->status === 'Diterima')
                                    <tr class="text-center bg-gray-800 border-b border-gray-700">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $registration->user->name }}</td>
                                        <td>{{ $registration->npm }}</td>
                                        <td>{{ $registration->class }}</td>
                                        <td>{{ $registration->period }}</td>
                                        <td>{{ $registration->course->name }}</td>
                                        <td>
                                            <x-primary-button tag="a"
                                                href="{{ route('jadwal.create', $registration->id) }}">
                                                Tambah Jadwal
                                            </x-primary-button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
