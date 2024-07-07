@extends('layouts.admin.app')

@section('title', 'Verifikasi Berkas')

@section('content')
    <section class="bg-gray-950 text-gray-200">
        <div class="container mx-auto px-4 py-8">
            <!-- Bagian Foto dan Data Diri -->
            <div class="bg-gray-800 rounded-lg shadow-md p-6 mb-6 md:flex md:items-center">
                <img src="{{ $registration->photo ? asset('storage/photo_profile/' . $registration->photo) : asset('assets/images/default_profil.jpg') }}"
                    alt="User Photo" class="w-32 h-32 full mb-4 md:mb-0 md:mr-6">
                <div>
                    <h2 class="text-xl font-bold mb-2 text-white">{{ $registration->user->name }}</h2>
                    <p class="text-gray-300"><strong>NPM:</strong> {{ $registration->npm }}</p>
                    <p class="text-gray-300"><strong>Kelas:</strong> {{ $registration->class }} {{ $registration->period }}
                    </p>
                    <p class="text-gray-300"><strong>Matkul Minat:</strong> {{ $registration->course->name }}</p>
                </div>
            </div>

            <!-- Bagian Tabel Berkas-Berkas -->
            <form method="POST" action="{{ route('verify.save', $registration->id) }}">
                @csrf
                <div class="overflow-x-auto">
                    <table class="w-full md:w-3/4 mx-auto bg-gray-800 text-gray-200 rounded-lg shadow-md">
                        <thead class="bg-gray-700 text-white">
                            <tr>
                                <th class="py-2 px-4">Nama Berkas</th>
                                <th class="py-2 px-4">Aksi</th>
                                <th class="py-2 px-4">Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (['fileCV', 'fileSuratLamaran', 'fileCertificate', 'fileFHS', 'fileSuratRekomendasi', 'fileProductImages', 'fileProduct'] as $fileField)
                                @if (!empty($registration->file->$fileField))
                                    <tr class="border-b border-gray-600">
                                        <td class="py-2 px-4">{{ basename($registration->file->$fileField) }}</td>
                                        <td class="py-2 px-4">
                                            @if (filter_var($registration->file->$fileField, FILTER_VALIDATE_URL))
                                                <a href="{{ $registration->file->$fileField }}" target="_blank"
                                                    class="text-blue-400 hover:underline">Link Product</a>
                                            @else
                                                <a href="{{ asset('storage/' . $registration->file->$fileField) }}"
                                                    target="_blank" class="text-blue-400 hover:underline">Preview</a>
                                            @endif
                                        </td>

                                        <td class="py-2 px-4">
                                            <input type="checkbox" name="verification[{{ $fileField }}]" value="1"
                                                {{ !empty($registration->file->verification) && $registration->file->verification->{$fileField . '_verified'} ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end mt-6 space-x-4 space-y-3">
                    <button type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">Save</button>
                </div>
            </form>





            <!-- Button -->




            {{-- <div class="flex justify-end mt-6 space-x-4 space-y-3">
                <x-primary-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'reject-registration')"
                    x-on:click="$dispatch('set-action', '{{ route('verify.reject', $registration->id) }}')">
                    {{ __('ditolak') }}
                </x-primary-button>

                <form method="POST" action="{{ route('verify.approve', $registration->id) }}">
                    @csrf
                    <x-secondary-button type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">Diterima</x-secondary-button>
                </form>
            </div> --}}
        </div>

        <!-- Modal Reject Registration -->
        <x-modal name="reject-registration" focusable>
            <h2 class="font-bold text-lg text-white px-6 py-4">Tolak Registrasi</h2>
            <form method="post" x-bind:action="action" enctype="multipart/form-data" class=" px-6">
                @csrf
                <div class="mb-4">
                    <label for="note" class="block text-gray-300 font-bold mb-2">Catatan:</label>
                    <textarea id="note" name="note"
                        class="w-full px-3 py-2 border border-gray-600 rounded-md bg-gray-700 text-gray-200" rows="4"></textarea>
                </div>
                <div class="text-right mb-6">
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">Tolak</button>
                </div>
            </form>
        </x-modal>
    </section>

@endsection
