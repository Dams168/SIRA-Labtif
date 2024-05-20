<nav class="border-gray-200 bg-gray-950">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <x-application-logo class="w-12 h-12 fill-current text-white" />
        </a>

        <!-- Non-Responsive Menu -->
        <div class="hidden md:flex md:items-center md:space-x-8 md:flex-grow md:justify-center" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-700 rounded-lg bg-gray-950 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                <li>
                    <a href="/"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:p-0 md:text-blue-500"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route('program') }}"
                        class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-500 md:p-0"
                        aria-current="page">Program</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-500 md:p-0">Kegiatanku</a>
                </li>
            </ul>
        </div>

        <!-- Conditional Profile or Login Button -->
        @if (Route::has('login'))
            <div class="flex items-center space-x-3">
                @auth
                    <div x-data="{ openProfile: false }" class="relative">
                        <button @click="openProfile = !openProfile" type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-600"
                            id="user-menu-button" aria-expanded="false">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/images/Logo-Laboratorium.png') }}"
                                alt="user photo">
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
                                <form method="POST" action="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </ul>
                        </div>
                    </div>
                @else
                    <x-primary-button tag="a" href="{{ route('login') }}"
                        class="text-sm bg-gray-800 text-white rounded-full px-4 py-2 focus:ring-4 focus:ring-gray-600">
                        Login
                    </x-primary-button>
                    <x-secondary-button tag="a" href="{{ route('register') }}"
                        class="text-sm bg-gray-800 text-white rounded-full px-4 py-2 focus:ring-4 focus:ring-gray-600">
                        Register
                    </x-secondary-button>
                @endauth
            </div>
        @endif

        <!-- Hamburger Menu for Mobile -->
        <div x-data="{ openMenu: false }" class="relative md:hidden">
            <button @click="openMenu = !openMenu" type="button"
                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-600" id="mobile-menu-button"
                aria-expanded="false">
                <span class="sr-only">Open mobile menu</span>
                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <div x-show="openMenu" @click.away="openMenu = false"
                class="z-50 absolute right-0 mt-2 w-48 bg-gray-700 border border-gray-600 divide-y divide-gray-600 rounded-lg shadow"
                id="mobile-menu-dropdown">
                <ul class="py-2" aria-labelledby="mobile-menu-button">
                    <li>
                        <a href="/"
                            class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('program') }}"
                            class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Program</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Kegiatanku</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
