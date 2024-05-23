<nav class="border-gray-200 bg-gray-950">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <x-application-logo class="w-12 h-12 fill-current text-white" />
        </a>

        <!-- Non-responsive menu -->
        <div class="hidden md:flex md:items-center md:space-x-8" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-700 rounded-lg bg-gray-950 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-500 md:p-0"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route('program') }}"
                        class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-500 md:p-0"
                        aria-current="page">Program</a>
                </li>
                <li>
                    <a href="{{ route('kegiatanku') }}"
                        class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-500 md:p-0"
                        aria-current="page">Kegiatanku</a>
                </li>
            </ul>
            @if (Route::has('login'))
                <div class="flex items-center space-x-3">
                    @auth
                        <div x-data="{ openProfile: false }" class="relative">
                            <button @click="openProfile = !openProfile" type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-600"
                                id="user-menu-button" aria-expanded="false">
                                @php
                                    $registration = Auth::user()->registration;
                                @endphp
                                @if (empty($registration->photo))
                                    <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-500"
                                        src="{{ asset('assets/images/default_profil.jpg') }}" alt="user photo">
                                @else
                                    <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-500"
                                        src="{{ asset('storage/photo_profile/' . $registration->photo) }}" alt="user photo">
                                @endif

                            </button>
                            <div x-show="openProfile" @click.away="openProfile = false"
                                class="z-50 absolute right-0 mt-2 w-48 bg-gray-700 border border-gray-600 divide-y divide-gray-600 rounded-lg shadow"
                                id="user-dropdown">
                                <div class="px-4 py-3">
                                    <span class="block text-sm text-white">{{ Auth::user()->name }}</span>
                                    <span class="block text-sm text-gray-400 truncate">{{ Auth::user()->email }}</span>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Akun</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}"
                                            class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">
                                            @csrf
                                            <a href="route('logout')"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <x-primary-button tag="a" href="{{ route('login') }}"
                            class="text-sm bg-gray-800 text-white rounded-full px-4 py-2 focus:ring-4 focus:ring-gray-600">
                            Login
                        </x-primary-button>
                    @endauth
                </div>
            @endif
        </div>

        <!-- Responsive menu -->
        <div class="md:hidden fixed bottom-0 left-0 z-50 w-full h-16 bg-gray-700 border-t border-gray-600">
            <div class="grid h-full max-w-lg grid-cols-4 mx-auto font-medium">
                <a href="{{ route('home') }}"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-2 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    <span class="text-sm text-gray-400 group-hover:text-blue-500">Home</span>
                </a>
                <a href="{{ route('program') }}"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-2 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                        <path
                            d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z" />
                    </svg>
                    <span class="text-sm text-gray-400 group-hover:text-blue-500">Program</span>
                </a>
                <a href="{{ route('kegiatanku') }}"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-2 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2" />
                    </svg>
                    <span class="text-sm text-gray-400 group-hover:text-blue-500">Kegiatanku</span>
                </a>
                @if (Route::has('login'))
                    @auth
                        <a href="#"
                            class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-800 group">
                            <svg class="w-5 h-5 mb-2 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                            <span class="text-sm text-gray-400 group-hover:text-blue-500">Profil</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-800 group">
                            <svg class="w-5 h-5 mb-2 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                            <span class="text-sm text-gray-400 group-hover:text-blue-500">Masuk</span>
                        </a>
                    @endauth
                @endif

            </div>
        </div>
    </div>
</nav>
