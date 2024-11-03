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
                    href="{{ route('koordinator.dashboard') }}">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Dashboard
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- End Sidebar -->
