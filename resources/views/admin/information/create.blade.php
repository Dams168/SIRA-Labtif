@extends('layouts.admin.app')

@section('title', 'Kelola Informasi')

@section('content')
    <section class="bg-gray-950 text-gray-200">
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Kelola Informasi</h2>
            <form action="{{ route('informasi.storeOrUpdate') }}" method="POST">
                @csrf

                <div>
                    <label for="tglOpenRecruitment" class="block text-gray-300">Tanggal Open Recruitment:</label>
                    <input type="date" name="tglOpenRecruitment" id="tglOpenRecruitment"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>
                <div>
                    <label for="tglCloseRecruitment" class="block text-gray-300">Tanggal Close Recruitment:</label>
                    <input type="date" name="tglClosedRecruitment" id="tglCloseRecruitment"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>
                <div>
                    <label for="tglTestTulis" class="block text-gray-300">Tanggal Test Tulis Dan Praktik:</label>
                    <input type="date" name="tglTestTulis" id="tglTestTulis"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>
                <div>
                    <label for="tglWawancaraAsisten" class="block text-gray-300">Tanggal Wawancara Asisten:</label>
                    <input type="date" name="tglWawancaraAsisten" id="tglWawancaraAsisten"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>
                <div>
                    <label for="tglWawancaraDosen" class="block text-gray-300">Tanggal Wawancara Dosen:</label>
                    <input type="date" name="tglWawancaraDosen" id="tglWawancaraDosen"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>
                <div>
                    <label for="tglPengumumanHasil" class="block text-gray-300">Tanggal Pengumuman Hasil:</label>
                    <input type="date" name="tglPengumumanHasil" id="tglPengumumanHasil"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>
                <x-primary-button type="submit">Tambahkan Informasi</x-primary-button>
            </form>
        </div>
    </section>
@endsection
