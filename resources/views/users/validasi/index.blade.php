@extends('layouts.user.app')

@section('title', 'Validasi')

@section('content')
    <section class="bg-gray-900 antialiased">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-3xl tracking-tight font-bold text-white">Status Pendaftaran</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="col-span-1 border rounded-lg shadow bg-gray-800 border-gray-700 max-h-56 max-w-sm">
                    <a href="#">
                        <img class="rounded-t-lg h-32 w-full object-cover" src="{{ asset($course->image) }}"
                            alt="course image" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ $course->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-400 text-end">Status : {{ $registration->status }}</p>
                    </div>
                </div>


                <div class="col-span-1 sm:col-span-2">
                    <div class="grid grid-cols-1 lg:grid-cols-1 gap-3">
                        @if ($registration->status === 'Diterima' or $registration->status === 'Ditolak')
                            <!-- Catatan -->
                            <div class="p-6 bg-gray-800 rounded-lg shadow-md">
                                <h3 class="text-lg font-bold text-white">Catatan :</h3>
                                <p class="mt-2 text-gray-400">{{ $registration->note }}</p>
                            </div>
                        @endif
                        @if ($registration->status === 'Ditolak')
                            <div class=" p-6 bg-gray-800 rounded-lg shadow-md">
                                <form method="POST" action="{{ route('validasi.update', $registration->id) }}"
                                    enctype="multipart/form-data" class="mt-6 space-y-6">
                                    @method('PATCH')
                                    @csrf
                                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                                        <div>
                                            <label for="fileCV" class="block mb-2 text-sm font-medium text-white">Upload
                                                CV</label>
                                            <input type="file" id="fileCV" name="fileCV"
                                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                accept=".pdf" required>
                                            @if ($file->fileCV)
                                                <p class="mt-1 text-sm text-gray-400">Previous File:
                                                    {{ basename($file->fileCV) }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <label for="fileSuratLamaran"
                                                class="block mb-2 text-sm font-medium text-white">Upload Surat
                                                Lamaran</label>
                                            <input type="file" id="fileSuratLamaran" name="fileSuratLamaran"
                                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                accept=".pdf" required>
                                            @if ($file->fileSuratLamaran)
                                                <p class="mt-1 text-sm text-gray-400">Previous File:
                                                    {{ basename($file->fileSuratLamaran) }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <label for="fileCertificate"
                                                class="block mb-2 text-sm font-medium text-white">Upload
                                                Certificate</label>
                                            <input type="file" id="fileCertificate" name="fileCertificate"
                                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                accept=".pdf" required>
                                            @if ($file->fileCertificate)
                                                <p class="mt-1 text-sm text-gray-400">Previous File:
                                                    {{ basename($file->fileCertificate) }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <label for="fileFHS" class="block mb-2 text-sm font-medium text-white">Upload
                                                FHS</label>
                                            <input type="file" id="fileFHS" name="fileFHS"
                                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                accept=".pdf" required>
                                            @if ($file->fileFHS)
                                                <p class="mt-1 text-sm text-gray-400">Previous File:
                                                    {{ basename($file->fileFHS) }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <label for="fileSuratRekomendasi"
                                                class="block mb-2 text-sm font-medium text-white">Upload Surat
                                                Rekomendasi</label>
                                            <input type="file" id="fileSuratRekomendasi" name="fileSuratRekomendasi"
                                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                accept=".pdf" required>
                                            @if ($file->fileSuratRekomendasi)
                                                <p class="mt-1 text-sm text-gray-400">Previous File:
                                                    {{ basename($file->fileSuratRekomendasi) }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <label for="fileProductImages"
                                                class="block mb-2 text-sm font-medium text-white">Upload Product
                                                Images</label>
                                            <input type="file" id="fileProductImages" name="fileProductImages"
                                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                accept=".pdf" required>
                                            @if ($file->fileProductImages)
                                                <p class="mt-1 text-sm text-gray-400">Previous File:
                                                    {{ basename($file->fileProductImages) }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <label for="fileProduct"
                                                class="block mb-2 text-sm font-medium text-white">Product
                                                Link</label>
                                            <input type="url" id="fileProduct" name="fileProduct"
                                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                value="{{ $file->fileProduct }}" required>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
