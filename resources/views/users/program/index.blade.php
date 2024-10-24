@extends('layouts.user.app')

@section('title', 'Program')

@section('content')
    <section class="bg-gray-900 antialiased p-6">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16 text-center">
                <h2 class="mb-4 text-3xl tracking-tight font-bold text-white">Mata Kuliah Minatan Rekrutmen
                    Asisten
                </h2>
            </div>
            <div class="lg:ml-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                    <div class="max-w-sm border rounded-lg shadow bg-gray-800 border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg w-auto h-72 object-cover object-center"
                                src="{{ asset('storage/course/' . ($course->image ?? '')) }}" alt="Uploaded Image"
                                onerror="this.onerror=null; this.src='{{ asset($course->image) }}';" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-white">
                                    {{ $course->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-400 text-justify">{{ $course->description }}</p>
                            @if (isset($registration))
                                <a href="{{ route('kegiatanku', $registration->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Kegiatanku
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('registration.create', $course->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Daftar
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
