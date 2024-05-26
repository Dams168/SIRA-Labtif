<!-- Sidebar -->
<div :class="{ '-translate-x-full': !open, 'translate-x-0': open }"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-neutral-800 border-r border-neutral-700 overflow-y-auto transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
    <div class="lg:flex lg:justify-center p-6">
        <button @click="open = false" class="text-gray-500 hover:text-gray-600 lg:hidden">
            <span class="sr-only">Close sidebar</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 8.293l6.293-6.293 1.414 1.414L11.414 10l6.293 6.293-1.414 1.414L10 11.414l-6.293 6.293-1.414-1.414L8.586 10 2.293 3.707l1.414-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <a class="flex-none text-xl font-semibold text-white" href="#">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div>
    <nav class="p-6 w-full flex flex-col flex-wrap">
        <ul class="space-y-1.5">
            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-400 rounded-lg hover:bg-neutral-700"
                    href="{{ route('dashboard') }}">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('kelola.file') }}"
                    class="text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-400 rounded-lg hover:bg-neutral-700 hover:text-neutral-300 hs-accordion-active:text-white">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V6.5L15.5 2z" />
                        <path d="M3 7.6v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8" />
                        <path d="M15 2v5h5" />
                    </svg>
                    Kelola Berkas
                </a>
            </li>

            <li>
                <a href="#"
                    class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-400 rounded-lg hover:bg-neutral-700 hover:text-neutral-300 hs-accordion-active:text-white">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="18" cy="15" r="3" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                        <path d="m21.7 16.4-.9-.3" />
                        <path d="m15.2 13.9-.9-.3" />
                        <path d="m16.6 18.7.3-.9" />
                        <path d="m19.1 12.2.3-.9" />
                        <path d="m19.6 18.7-.4-1" />
                        <path d="m16.8 12.3-.4-1" />
                        <path d="m14.3 16.6 1-.4" />
                        <path d="m20.7 13.8 1-.4" />
                    </svg>
                    Kelola Jadwal
                </a>
            </li>

            <li>
                <a href="#"
                    class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-400 rounded-lg hover:bg-neutral-700 hover:text-neutral-300 hs-accordion-active:text-white">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V6.5L15.5 2z" />
                        <path d="M3 7.6v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8" />
                        <path d="M15 2v5h5" />
                    </svg>
                    Kelola Hasil
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- End Sidebar -->
