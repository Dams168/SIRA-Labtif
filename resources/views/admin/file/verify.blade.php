@extends('layouts.admin.app')

@section('title', 'Verifikasi Berkas')

@section('content')
    <section class="bg-gray-900">
        <div class="container mx-auto px-4 py-8">
            <!-- Bagian Foto dan Data Diri -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 md:flex md:items-center">
                <img src="{{ $registration->photo ? asset('storage/photo_profile/' . $registration->photo) : asset('assets/images/default_profil.jpg') }}"
                    alt="User Photo" class="w-32 h-32 rounded-full mb-4 md:mb-0 md:mr-6">
                <div>
                    <h2 class="text-xl font-bold mb-2">{{ $registration->user->name }}</h2>
                    <p class="text-gray-700"><strong>NPM:</strong> {{ $registration->npm }}</p>
                    <p class="text-gray-700"><strong>Kelas:</strong> {{ $registration->class }} {{ $registration->period }}
                    </p>
                    <p class="text-gray-700"><strong>Matkul Minat:</strong> {{ $registration->course->name }}</p>
                </div>
            </div>

            <!-- Bagian Tabel Berkas-Berkas -->
            <div class="overflow-x-auto">
                <table class="w-full bg-white rounded-lg shadow-md">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4">Nama Berkas</th>
                            <th class="py-2 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (['fileCV', 'fileSuratLamaran', 'fileCertificate', 'fileFHS', 'fileSuratRekomendasi', 'fileProductImages'] as $fileField)
                            @if (!empty($registration->file->$fileField))
                                <tr class="border-b">
                                    <td class="py-2 px-4">{{ basename($registration->file->$fileField) }}</td>
                                    <td class="py-2 px-4">
                                        <a href="{{ asset('storage/' . $registration->file->$fileField) }}" target="_blank"
                                            class="text-blue-500 hover:underline">Preview</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Bagian Tombol Ditolak dan Diterima -->
            <div class="flex justify-end mt-6">
                <x-primary-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'reject-registration')"
                    x-on:click="$dispatch('set-action', '{{ route('verify.reject', $registration->id) }}')">
                    {{ __('ditolak') }}
                </x-primary-button>

                <form method="POST" action="{{ route('verify.approve', $registration->id) }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">Diterima</button>
                </form>
            </div>
        </div>

        <!-- Modal Reject Registration -->
        <x-modal name="reject-registration" focusable>
            <h2 class="font-bold text-lg">Tolak Registrasi</h2>
            <form method="post" x-bind:action="action" enctype="multipart/form-data" class="mt-4">
                @csrf
                <div class="mb-4">
                    <label for="note" class="block text-gray-700 font-bold mb-2">Catatan:</label>
                    <textarea id="note" name="note" class="w-full px-3 py-2 border rounded-md" rows="4"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">Tolak</button>
                </div>
            </form>
        </x-modal>
    </section>

@endsection
