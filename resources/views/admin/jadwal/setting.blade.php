@extends('layouts.admin.app')

@section('title', 'Kelola Jadwal')

@section('content')
    <section class="bg-gray-950 text-gray-200">
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-4xl font-medium text-gray-300 pb-6 text-center">Tambah Jadwal</h2>
            <form action="{{ route('jadwal.storeOrUpdateAll') }}" method="POST" class="space-y-6">
                @csrf

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <div class="flex-1">
                        <label for="tanggalTestTulis" class="block text-gray-300">Tanggal Test Tulis:</label>
                        <input type="date" name="tanggalTestTulis" id="tanggalTestTulis"
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>

                    <div class="flex-1">
                        <label for="jumlahRuanganTestTulis" class="block text-gray-300">Jumlah Ruangan untuk Test
                            Tulis:</label>
                        <input type="number" name="jumlahRuanganTestTulis" id="jumlahRuanganTestTulis" min="1"
                            required
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <div class="flex-1">
                        <label for="tanggalWawancaraAsisten" class="block text-gray-300">Tanggal Wawancara Asisten:</label>
                        <input type="date" name="tanggalWawancaraAsisten" id="tanggalWawancaraAsisten"
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>

                    <div class="flex-1">
                        <label for="jumlahRuanganWawancaraAsisten" class="block text-gray-300">Jumlah Ruangan untuk
                            Wawancara Asisten:</label>
                        <input type="number" name="jumlahRuanganWawancaraAsisten" id="jumlahRuanganWawancaraAsisten"
                            min="1" required
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <div class="flex-1">
                        <label for="tanggalWawancaraDosen" class="block text-gray-300">Tanggal Wawancara Dosen:</label>
                        <input type="date" name="tanggalWawancaraDosen" id="tanggalWawancaraDosen"
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>

                    <div class="flex-1">
                        <label for="jumlahRuanganWawancaraDosen" class="block text-gray-300">Jumlah Ruangan untuk Wawancara
                            Dosen:</label>
                        <input type="number" name="jumlahRuanganWawancaraDosen" id="jumlahRuanganWawancaraDosen"
                            min="1" required
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>
                </div>

                <div class="flex justify-center">
                    <x-primary-button type="submit">Tambahkan Jadwal</x-primary-button>
                </div>
            </form>
        </div>
    </section>
@endsection
