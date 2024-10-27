@extends('layouts.user.app')

@section('title', 'User Profile')

@section('content')
    <section class="bg-gray-900 antialiased">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="col-span-1">
                    <div class="border rounded-lg shadow bg-gray-800 border-gray-700 p-4">
                        <div class="flex flex-row gap-5 items-center ">
                            @if (empty($registration->photo))
                                <img class="w-20 h-20 p-1 rounded-full ring-2 ring-gray-500"
                                    src="{{ asset('assets/images/default_profil.jpg') }}" alt="user photo">
                            @else
                                <img class="w-20 h-20 p-1 rounded-full ring-2 ring-gray-500"
                                    src="{{ asset('storage/photo_profile/' . $registration->photo) }}" alt="user photo">
                            @endif
                            <div class="flex flex-col">
                                <h5 class="text-lg font-medium text-white">{{ $registration->name ?? '-' }}</h5>
                                <span class="text-sm text-gray-400">{{ $registration->class ?? '-' }} -
                                    {{ $registration->period ?? '-' }}</span>
                                <span class="text-sm text-gray-400">{{ $user->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded-lg shadow bg-gray-800 border-gray-700 p-6 mt-6">
                        <h3 class="text-xl font-semibold text-white mb-4 border-b border-gray-600 pb-2">Pengaturan Akun
                        </h3>

                        <ul class="space-y-4">
                            @if (isset($registration))
                                <li
                                    class="flex items-center justify-between text-white pb-2 border-b border-gray-600 hover:text-blue-600 transition duration-300">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                        <a href="{{ route('userprofile.edit', Auth::user()->id) }}">Edit Profile</a>
                                    </div>
                                </li>
                            @endif

                            {{-- <li
                                class="flex items-center justify-between pb-2 border-b border-gray-600 text-white hover:text-blue-600 transition duration-300">
                                <div class="flex items-center gap-3">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                            d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                    </svg>

                                    <a href="#">Edit Dokumen</a>
                                </div>
                            </li> --}}

                            <li
                                class="flex items-center justify-between pb-2 border-b border-gray-600 text-white hover:text-red-600 transition duration-300">
                                <div class="flex items-center gap-3">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                    </svg>

                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <a href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col-span-2 border rounded-lg shadow bg-gray-800 border-gray-700 p-6">
                    <div class="col-span-2 bg-gray-800 p-6">
                        <h3 class="text-xl font-semibold text-white mb-4 border-b border-gray-600 pb-2">Informasi
                            Pribadi</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-white">Nama:</p>
                                <p class="text-gray-400">{{ $registration->name ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-white">NPM:</p>
                                <p class="text-gray-400">{{ $registration->npm ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-white">Kelas:</p>
                                <p class="text-gray-400">{{ $registration->class ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-white">Angkatan:</p>
                                <p class="text-gray-400">{{ $registration->period ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-white">No Telepon:</p>
                                <p class="text-gray-400">{{ $registration->phone ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
