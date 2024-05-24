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
                    <a href="{{ route('validasi') }}"
                        class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-500 md:p-0"
                        aria-current="page">Validasi</a>
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
        <div
            class="md:hidden fixed bottom-0 left-0 z-50 w-full h-16 bg-gray-700 border-t border-gray-600 flex justify-between">
            <a href="{{ route('home') }}" class="flex flex-col items-center justify-center flex-1 hover:bg-gray-800">
                <svg class="w-5 h-5 mb-2 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                <span class="text-sm text-gray-400 group-hover:text-blue-500">Home</span>
            </a>
            <a href="{{ route('program') }}"
                class="flex flex-col items-center justify-center flex-1 hover:bg-gray-800">
                <svg class="w-5 h-5 mb-2 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 30 30">
                    <path
                        d="M24.707,8.793l-6.5-6.5C18.019,2.105,17.765,2,17.5,2H7C5.895,2,5,2.895,5,4v22c0,1.105,0.895,2,2,2h16c1.105,0,2-0.895,2-2 V9.5C25,9.235,24.895,8.981,24.707,8.793z M18,21h-8c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h8c0.552,0,1,0.448,1,1 C19,20.552,18.552,21,18,21z M20,17H10c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1h10c0.552,0,1,0.448,1,1C21,16.552,20.552,17,20,17 z M18,10c-0.552,0-1-0.448-1-1V3.904L23.096,10H18z">
                    </path>
                </svg>

                <span class="text-sm text-gray-400 group-hover:text-blue-500">Program</span>
            </a>
            <a href="{{ route('validasi') }}"
                class="flex flex-col items-center justify-center flex-1 hover:bg-gray-800">
                <svg class="w-6 h-6 mb-1 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M20,6h-8l-2-2H4C2.9,4,2,4.9,2,6v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V8C22,6.9,21.1,6,20,6z">
                    </path>

                </svg>
                <span class="text-sm text-gray-400 group-hover:text-blue-500">Validasi</span>
            </a>
            <a href="{{ route('kegiatanku') }}"
                class="flex flex-col items-center justify-center flex-1 hover:bg-gray-800">
                <svg class="w-6 h-6 mb-1 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M 9 3 L 9 4 L 4 4 C 2.895 4 2 4.895 2 6 L 2 12 C 2 13.103 2.897 14 4 14 L 20 14 C 21.103 14 22 13.103 22 12 L 22 6 C 22 4.895 21.105 4 20 4 L 15 4 L 15 3 L 9 3 z M 12 10 C 12.552 10 13 10.448 13 11 C 13 11.552 12.552 12 12 12 C 11.448 12 11 11.552 11 11 C 11 10.448 11.448 10 12 10 z M 2 15.443359 L 2 18 C 2 19.105 2.895 20 4 20 L 20 20 C 21.105 20 22 19.105 22 18 L 22 15.443359 C 21.409 15.787359 20.732 16 20 16 L 4 16 C 3.268 16 2.591 15.787359 2 15.443359 z">
                    </path>

                </svg>
                <span class="text-sm text-gray-400 group-hover:text-blue-500">Kegiatanku</span>
            </a>
            @if (Route::has('login'))
                @auth
                    <a href="#" class="flex flex-col items-center justify-center flex-1 hover:bg-gray-800">
                        <svg class="w-5 h-5 mb-2 text-gray-400 group-hover:text-blue-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        <span class="text-sm text-gray-400 group-hover:text-blue-500">Profil</span>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="flex flex-col items-center justify-center flex-1 hover:bg-gray-800">
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
</nav>
