@extends('layouts.admin.app')

@section('title', 'Kelola Jadwal')

@section('content')
    <section class="bg-gray-950 text-gray-200">
        <div class="container mx-auto px-4 py-8">

            <h2 class="text-4xl font-medium text-gray-300 pb-6">Tambah Jadwal</h2>
            <form action="{{ route('jadwal.store', $registration->id) }}" method="POST">
                @csrf

                <div>
                    <label for="tanggalTestTulis" class="block text-gray-300">Tanggal Test Tulis:</label>
                    <input type="date" name="tanggalTestTulis" id="tanggalTestTulis"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>

                <div>
                    <label for="tanggalWawancaraAsisten" class="block text-gray-300">Tanggal Wawancara Asisten:</label>
                    <input type="date" name="tanggalWawancaraAsisten" id="tanggalWawancaraAsisten"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>

                <div>
                    <label for="tanggalWawancaraDosen" class="block text-gray-300">Tanggal Wawancara Dosen:</label>
                    <input type="date" name="tanggalWawancaraDosen" id="tanggalWawancaraDosen"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>

                <x-primary-button type="submit">Tambah Jadwal</x-primary-button>
            </form>
        </div>
    </section>
@endsection
