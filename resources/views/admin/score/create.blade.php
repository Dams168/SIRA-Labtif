@extends('layouts.admin.app')

@section('title', 'Tambah Nilai')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Tambah Nilai</h2>
            <form action="{{ route('score.storeOrUpdateAll') }}" method="POST">
                @csrf

                <input type="hidden" name="registrationId" value="{{ $registration->id }}">

                <div>
                    <label for="testTulis" class="block text-gray-300">Nilai Test Tulis:</label>
                    <input type="number" name="testTulis" id="testTulis"
                        value="{{ old('testTulis', $registration->test->testTulis ?? '') }}"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>

                <div>
                    <label for="wawancaraAsisten" class="block text-gray-300">Nilai Wawancara Asisten:</label>
                    <input type="number" name="wawancaraAsisten" id="wawancaraAsisten"
                        value="{{ old('wawancaraAsisten', $registration->test->wawancaraAsisten ?? '') }}"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>

                <div>
                    <label for="wawancaraDosen" class="block text-gray-300">Nilai Wawancara Dosen:</label>
                    <input type="number" name="wawancaraDosen" id="wawancaraDosen"
                        value="{{ old('wawancaraDosen', $registration->test->wawancaraDosen ?? '') }}"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>

                <x-primary-button type="submit">Tambahkan Nilai</x-primary-button>
            </form>
        </div>
    </section>
@endsection
