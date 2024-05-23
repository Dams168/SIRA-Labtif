@extends('layouts.user.app')

@section('title', 'Upload Files')

@section('content')
    <section class="bg-gray-900 antialiased p-6">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <form method="POST" action="{{ route('file.store', $registration->id) }}" enctype="multipart/form-data"
                class="mt-6 space-y-6">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="fileCV" class="block mb-2 text-sm font-medium text-white">Upload CV</label>
                        <input type="file" id="fileCV" name="fileCV"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            accept=".pdf" required>
                    </div>
                    <div>
                        <label for="fileSuratLamaran" class="block mb-2 text-sm font-medium text-white">Upload Surat
                            Lamaran</label>
                        <input type="file" id="fileSuratLamaran" name="fileSuratLamaran"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            accept=".pdf" required>
                    </div>
                    <div>
                        <label for="fileCertificate" class="block mb-2 text-sm font-medium text-white">Upload
                            Certificate</label>
                        <input type="file" id="fileCertificate" name="fileCertificate"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            accept=".pdf" required>
                    </div>
                    <div>
                        <label for="fileFHS" class="block mb-2 text-sm font-medium text-white">Upload FHS</label>
                        <input type="file" id="fileFHS" name="fileFHS"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            accept=".pdf" required>
                    </div>
                    <div>
                        <label for="fileSuratRekomendasi" class="block mb-2 text-sm font-medium text-white">Upload Surat
                            Rekomendasi</label>
                        <input type="file" id="fileSuratRekomendasi" name="fileSuratRekomendasi"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            accept=".pdf" required>
                    </div>
                    <div>
                        <label for="fileProductImages" class="block mb-2 text-sm font-medium text-white">Upload Product
                            Images</label>
                        <input type="file" id="fileProductImages" name="fileProductImages"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            accept=".pdf" required>
                    </div>
                    <div>
                        <label for="fileProduct" class="block mb-2 text-sm font-medium text-white">Product Link</label>
                        <input type="url" id="fileProduct" name="fileProduct"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                            placeholder="https://example.com/product" required>
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </section>
@endsection
