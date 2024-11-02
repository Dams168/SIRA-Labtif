@extends('layouts.admin.app')

@section('title', 'Tambah Nilai')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Edit Nilai - {{ $registration->name }}</h2>

            <form action="{{ route('score.storeOrUpdateAll') }}" method="POST">
                @csrf
                <input type="hidden" name="registrationId" value="{{ $registration->id }}">

                <div class="mt-8">
                    <h3 class="text-2xl text-gray-400 pb-4">Test Tulis dan Praktik</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                        <div>
                            <label for="psikotest" class="block text-gray-300">Nilai Psikotest:</label>
                            <input type="number" name="psikotest" id="psikotest"
                                value="{{ old('psikotest', $registration->test->testDetail->psikotest ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('psikotest')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="umum" class="block text-gray-300">Nilai Pengetahuan Umum:</label>
                            <input type="number" name="umum" id="umum"
                                value="{{ old('umum', $registration->test->testDetail->umum ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('umum')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="minatan" class="block text-gray-300">Nilai Minatan:</label>
                            <input type="number" name="minatan" id="minatan"
                                value="{{ old('minatan', $registration->test->testDetail->minatan ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('minatan')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="praktek" class="block text-gray-300">Nilai Praktek:</label>
                            <input type="number" name="praktek" id="praktek"
                                value="{{ old('praktek', $registration->test->testDetail->praktek ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('praktek')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-2xl text-gray-400 pb-4">Wawancara Asisten</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label for="mengajar" class="block text-gray-300">Nilai Kemampuan Mengajar:</label>
                            <input type="number" name="mengajar" id="mengajar"
                                value="{{ old('mengajar', $registration->test->testDetail->mengajar ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('mengajar')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="pengenalanDiri" class="block text-gray-300">Nilai Pengenalan Diri dan
                                Motivasi:</label>
                            <input type="number" name="pengenalanDiri" id="pengenalanDiri"
                                value="{{ old('pengenalanDiri', $registration->test->testDetail->pengenalanDiri ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('pengenalanDiri')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-2xl text-gray-400 pb-4">Wawancara Dosen</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                        <div>
                            <label for="dosen1" class="block text-gray-300">Nilai Dosen 1:</label>
                            <input type="number" name="dosen1" id="dosen1"
                                value="{{ old('dosen1', $registration->test->testDetail->dosen1 ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('dosen1')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="dosen2" class="block text-gray-300">Nilai Dosen 2:</label>
                            <input type="number" name="dosen2" id="dosen2"
                                value="{{ old('dosen2', $registration->test->testDetail->dosen2 ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('dosen2')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="dosen3" class="block text-gray-300">Nilai Dosen 3:</label>
                            <input type="number" name="dosen3" id="dosen3"
                                value="{{ old('dosen3', $registration->test->testDetail->dosen3 ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('dosen3')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="dosen4" class="block text-gray-300">Nilai Dosen 4:</label>
                            <input type="number" name="dosen4" id="dosen4"
                                value="{{ old('dosen4', $registration->test->testDetail->dosen4 ?? '') }}"
                                class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full bg-gray-800 text-gray-200">
                            @error('dosen4')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="mt-8">
                    <label for="result" class="block text-gray-300">Hasil Seleksi:</label>
                    <select name="result" id="result"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                        <option value="Menunggu" {{ old('result') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Diterima" {{ old('result') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Ditolak" {{ old('result') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="mt-8">
                    <button type="submit"
                        class="w-full sm:w-auto px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white font-semibold">
                        Simpan Nilai
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
