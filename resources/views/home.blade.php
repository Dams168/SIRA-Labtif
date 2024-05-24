@extends('layouts.user.app')

@section('title', 'Home')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-cover bg-center" style="background-image: url('{{ asset('assets/images/bg-hero1.jpeg') }}');">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                    Rekrutmen Aslabtif
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-300 lg:mb-8 md:text-lg lg:text-xl">Mari bergabung dengan
                    kami untuk mengasah keterampilan teknis, berkontribusi dalam pengembangan lab, dan menjadi bagian dari
                    komunitas yang bersemangat dan inovatif.
                </p>
                <x-primary-button tag="a" href="{{ route('program') }}" class="px-5 py-3 mr-3">
                    Lihat Program
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </x-primary-button>
                <x-secondary-button tag="a" href="#terms" class="px-5 py-3 mr-3">
                    Cek Persyaratan Umum
                </x-secondary-button>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('assets/images/hero.png') }}" alt="mockup">
            </div>
        </div>
    </section>


    {{-- Features Section --}}
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="{{ asset('assets/images/features.png') }}" alt="mockup">
                </div>
                <div class="mr-auto place-self-center lg:col-span-7">
                    <h1
                        class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                        Asisten Laboratorium
                    </h1>
                    <p class="max-w-2xl mb-6 font-light text-gray-300 lg:mb-8 md:text-lg lg:text-xl">
                        Mari bersama-sama mengukir prestasi dan berkontribusi dalam menciptakan lingkungan belajar yang
                        inspiratif dan produktif.
                    </p>
                </div>
            </div>
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">Apa saja manfaat menjadi Aslab?</h2>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-gray-800 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-gray-300 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-white">Relasi</h3>
                    <p class="text-gray-400">Membangun jaringan dengan dosen, keluarga besar ASLABTIF, dan profesional di
                        bidang Teknik Informatika.</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-gray-800 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-gray-300 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-white">Keterampilan</h3>
                    <p class="text-gray-400">Kesempatan untuk meningkatkan keterampilan teknis dan soft skills.</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-gray-800 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-gray-300 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-white">Pengalaman</h3>
                    <p class="text-gray-400">Memperoleh pengalaman langsung dalam mengelola dan mengembangkan kegiatan
                        laboratorium.</p>
                </div>
            </div>
        </div>
    </section>


    {{-- terms and condition section --}}
    <section id="terms" class="bg-cover bg-center"
        style="background-image: url('{{ asset('assets/images/bg-terms.jpeg') }}');">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <h3 class="mb-4 text-xl font-extrabold tracking-tight leading-none text-white md:text-3xl lg:text-4xl">
                Apa saja syarat menjadi asisten?</h3>
            <p class="mb-8 text-lg font-normal text-gray-400 lg:text-xl sm:px-16 xl:px-48">
                Berikut adalah persyaratan umum dari beberapa program Rekrutmen Aslabtif.
            </p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-center rtl:text-right text-gray-400">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Struktur Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jaringan Komputer
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pemrograman Berbasis Objek
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Multimedia
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pemrograman Web
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-800 border-b border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                Semester
                            </th>
                            <td class="px-6 py-4">
                                3
                            </td>
                            <td class="px-6 py-4">
                                5
                            </td>
                            <td class="px-6 py-4">
                                5
                            </td>
                            <td class="px-6 py-4">
                                5
                            </td>
                            <td class="px-6 py-4">
                                5
                            </td>
                        </tr>
                        <tr class="bg-gray-800 border-b border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                Nilai Matkul Minatan
                            </th>
                            <td class="px-6 py-4">
                                B
                            </td>
                            <td class="px-6 py-4">
                                B
                            </td>
                            <td class="px-6 py-4">
                                B
                            </td>
                            <td class="px-6 py-4">
                                B
                            </td>
                            <td class="px-6 py-4">
                                B
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-8 lg:px-6">
                <h2 class="mb-2 text-lg font-semibold text-white">Catatan Lain:</h2>
                <ul class="max-w-md space-y-1 text-gray-400 list-disc list-inside">
                    <li>
                        Bersedia berkomitmen untuk menjalankan tugas dan tanggung jawab sebagai asisten laboratorium.
                    </li>
                    <li>
                        Dapat bekerja sama dalam tim
                    </li>
                    <li>
                        Memiliki minat dan kemampuan di bidang teknis laboratorium.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Timeline Section --}}
    <section class="bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl font-extrabold leading-tight tracking-tight text-white">
                    Alur Pendaftaran
                </h2>
            </div>

            <div class="flow-root max-w-3xl mx-auto mt-8 sm:mt-12 lg:mt-16">
                <ol class="items-center sm:flex">
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-900 rounded-full ring-0 ring-gray-900 sm:ring-8 shrink-0">
                                <svg class="w-2.5 h-2.5 text-blue-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <div class="hidden sm:flex w-full bg-gray-700 h-0.5"></div>
                        </div>
                        <div class="mt-3 sm:pe-8">
                            <h3 class="text-lg font-semibold text-white">Pengumpulan Berkas</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-500">TBH</time>
                            <p class="text-base font-normal text-gray-400">Get started with dozens of web components and
                                interactive elements.</p>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-900 rounded-full ring-0 ring-gray-900 sm:ring-8 shrink-0">
                                <svg class="w-2.5 h-2.5 text-blue-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <div class="hidden sm:flex w-full bg-gray-700 h-0.5"></div>
                        </div>
                        <div class="mt-3 sm:pe-8">
                            <h3 class="text-lg font-semibold text-white">Test Tulis & Praktik</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-500">TBH</time>
                            <p class="text-base font-normal text-gray-400">Get started with dozens of web components and
                                interactive elements.</p>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-900 rounded-full ring-0 ring-gray-900 sm:ring-8 shrink-0">
                                <svg class="w-2.5 h-2.5 text-blue-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <div class="hidden sm:flex w-full bg-gray-700 h-0.5"></div>
                        </div>
                        <div class="mt-3 sm:pe-8">
                            <h3 class="text-lg font-semibold text-white">Wawancara Asisten</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-500">TBH</time>
                            <p class="text-base font-normal text-gray-400">Get started with dozens of web components and
                                interactive elements.</p>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-900 rounded-full ring-0 ring-gray-900 sm:ring-8 shrink-0">
                                <svg class="w-2.5 h-2.5 text-blue-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <div class="hidden sm:flex w-full bg-gray-700 h-0.5"></div>
                        </div>
                        <div class="mt-3 sm:pe-8">
                            <h3 class="text-lg font-semibold text-white">Wawancara Dosen</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-500">TBH</time>
                            <p class="text-base font-normal text-gray-400">Get started with dozens of web components and
                                interactive elements.</p>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-900 rounded-full ring-0 ring-gray-900 sm:ring-8 shrink-0">
                                <svg class="w-2.5 h-2.5 text-blue-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <div class="hidden sm:flex w-full bg-gray-700 h-0.5"></div>
                        </div>
                        <div class="mt-3 sm:pe-8">
                            <h3 class="text-lg font-semibold text-white">Pengumuman Hasil</h3>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-500">TBH</time>
                            <p class="text-base font-normal text-gray-400">Get started with dozens of web components and
                                interactive elements.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </section>

@endsection
