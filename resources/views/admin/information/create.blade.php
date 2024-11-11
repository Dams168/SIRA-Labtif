@extends('layouts.admin.app')

@section('title', 'Kelola Informasi')

@section('content')
    <section class="bg-gray-950 text-gray-200 py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Kelola Informasi</h2>
            <form action="{{ route('informasi.storeOrUpdate') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div>
                        <label for="tglOpenRecruitment" class="block text-gray-300">Tanggal Open Recruitment:</label>
                        <input type="date" name="tglOpenRecruitment" id="tglOpenRecruitment"
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>
                    <div>
                        <label for="tglCloseRecruitment" class="block text-gray-300">Tanggal Close Recruitment:</label>
                        <input type="date" name="tglClosedRecruitment" id="tglCloseRecruitment"
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>
                    <div>
                        <label for="tglPraRecruitment" class="block text-gray-300">Tanggal Pra Recruitment:</label>
                        <input type="date" name="tglPraRecruitment" id="tglPraRecruitment"
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>
                    <div>
                        <label for="tglProsesAwal" class="block text-gray-300">Tanggal Proses Awal Rekrutmen:</label>
                        <input type="date" name="tglProsesAwal" id="tglProsesAwal"
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>
                    <div>
                        <label for="tglProsesAkhir" class="block text-gray-300">Tanggal Proses Akhir Rekrutmen:</label>
                        <input type="date" name="tglProsesAkhir" id="tglProsesAkhir"
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>
                    <div>
                        <label for="tglPengumumanHasil" class="block text-gray-300">Tanggal Pengumuman Hasil:</label>
                        <input type="date" name="tglPengumumanHasil" id="tglPengumumanHasil"
                            class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <x-primary-button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded-md text-white">
                        Tambahkan Informasi
                    </x-primary-button>
                </div>
            </form>
        </div>
    </section>
@endsection
