@extends('layouts.user.app')

@section('title', 'Validasi')

@section('content')
    <section class="bg-gray-900 antialiased">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-3xl tracking-tight font-bold text-white">Kegiatanku</h2>
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
                        <p class="mb-3 font-normal text-gray-400 text-end">Status Pendaftaran : {{ $registration->status }}
                        </p>
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
                            <div class="p-6 bg-gray-800 rounded-lg shadow-md">
                                <form method="POST" action="{{ route('kegiatanku.update', $registration->id) }}"
                                    enctype="multipart/form-data" class="mt-6 space-y-6">
                                    @method('PATCH')
                                    @csrf
                                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                                        @if (!$file->verification || !$file->verification->fileCV_verified)
                                            <div>
                                                <label for="fileCV"
                                                    class="block mb-2 text-sm font-medium text-white">Upload CV</label>
                                                <input type="file" id="fileCV" name="fileCV"
                                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                    accept=".pdf" required>
                                                @if ($file->fileCV)
                                                    <p class="mt-1 text-sm text-gray-400">Previous File:
                                                        {{ basename($file->fileCV) }}</p>
                                                @endif
                                            </div>
                                        @endif

                                        @if (!$file->verification || !$file->verification->fileSuratLamaran_verified)
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
                                        @endif

                                        @if (!$file->verification || !$file->verification->fileCertificate_verified)
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
                                        @endif

                                        @if (!$file->verification || !$file->verification->fileFHS_verified)
                                            <div>
                                                <label for="fileFHS"
                                                    class="block mb-2 text-sm font-medium text-white">Upload FHS</label>
                                                <input type="file" id="fileFHS" name="fileFHS"
                                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                    accept=".pdf" required>
                                                @if ($file->fileFHS)
                                                    <p class="mt-1 text-sm text-gray-400">Previous File:
                                                        {{ basename($file->fileFHS) }}</p>
                                                @endif
                                            </div>
                                        @endif

                                        @if (!$file->verification || !$file->verification->fileProductImages_verified)
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
                                        @endif

                                        @if (!$file->verification || !$file->verification->fileProduct_verified)
                                            <div>
                                                <label for="fileProduct"
                                                    class="block mb-2 text-sm font-medium text-white">Product Link</label>
                                                <input type="url" id="fileProduct" name="fileProduct"
                                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                                    value="{{ $file->fileProduct }}" required>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                                </form>
                            </div>
                        @endif

                        @if ($registration->status === 'Diterima')
                            <div class="bg-gray-800 rounded-lg shadow-md">
                                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
                                    <h3
                                        class="mb-4 text-xl font-extrabold tracking-tight leading-none text-white md:text-3xl lg:text-4xl">
                                        Jadwal Rekrutmen Asisten</h3>
                                    <p class="mb-8 text-lg font-normal text-gray-400 lg:text-lg">
                                        Berikut adalah Jadwal test yang harus diikuti oleh peserta yang telah diterima
                                    </p>
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-center rtl:text-right text-gray-400">
                                            <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Nama Test
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Tanggal Test
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Ruangan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($schedules as $schedule)
                                                    <tr class="bg-gray-800 border-b border-gray-700">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                            {{ ucwords(str_replace('_', ' ', $schedule->scheduleName)) }}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{ \Carbon\Carbon::parse($schedule->scheduleDate)->locale('id')->translatedFormat('l, d F Y') }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $schedule->room }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($registration->status === 'Diterima' && $result)
                            @if ($result->result === 'Diterima')
                                <x-primary-button tag="a" href="{{ route('result.accepted') }}">Lihat
                                    Hasil</x-primary-button>
                            @elseif ($result->result === 'Ditolak')
                                <x-primary-button tag="a" href="{{ route('result.rejected') }}">Lihat
                                    Hasil</x-primary-button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
