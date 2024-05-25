@extends('layouts.admin.app')

@section('title', 'Home')

@section('content')
    <section class="bg-gray-900">
        <div class="container mx-auto px-6 py-8">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Kelola Berkas</h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                        <tr>
                            <th scope="col" class="px-3 py-3">
                                No
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-3 py-3">
                                NPM
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Kelas
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Angkatan
                            </th>
                            <th scope="col" class="px-3 py-3">
                                tgl Daftar
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Matkul Minat
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $key => $registration)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $registration->user->name }}</td>
                                <td>{{ $registration->npm }}</td>
                                <td>{{ $registration->class }}</td>
                                <td>{{ $registration->period }}</td>
                                <td>{{ $registration->regDate }}</td>
                                <td>{{ $registration->course->name }}</td>

                                <td>
                                    <x-primary-button tag="a" href="{{ route('show.verify', $registration->id) }}">
                                        Verifikasi
                                    </x-primary-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
