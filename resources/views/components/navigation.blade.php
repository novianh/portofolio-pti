<div class="flex bg-gray-50 h-screen dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Admin Dashboard
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('admin') ? 'text-gray-800 dark:text-gray-100' : '' }}  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 "
                        href="{{ route('dashboard.index') }}">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/post') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors {{ Request::is('admin/post') ? 'text-gray-800 dark:text-gray-100' : '' }} duration-150 hover:text-gray-800 dark:hover:text-gray-200 "
                        href="{{ route('post.index') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span class="ml-4">Posts</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/skill') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200
                        {{ Request::is('admin/skill') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                        href="{{ route('skill.index') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                        <span class="ml-4">Skill</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/exp') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200
                        {{ Request::is('admin/exp') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                        href="{{ route('exp.index') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="ml-4">Experience</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/project') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200
                        {{ Request::is('admin/project') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                        href="{{ route('project.index') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="ml-4">Projects</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/sc') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200
                        {{ Request::is('admin/sc') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                        href="{{ route('sc.index') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                            </path>
                        </svg>
                        <span class="ml-4">Contact</span>
                    </a>
                </li>

            </ul>

        </div>
    </aside>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Dashboard Admin
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100  {{ Request::is('admin') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/post') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200  {{ Request::is('admin/post') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                        href="{{ route('post.index') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span class="ml-4">Posts</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/skill') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200  {{ Request::is('admin/skill') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                        href="{{ route('skill.index') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                        <span class="ml-4">Skill</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/exp') ? '' : 'hidden' }}"
                        aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200  {{ Request::is('admin/exp') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                        href="{{ route('exp.index') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                        <span class="ml-4">Experience</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <span
                    class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/project') ? '' : 'hidden' }}"
                    aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ Request::is('admin/project') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                        href="{{ route('project.index') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                        <span class="ml-4">Projects</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <span
                    class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg {{ Request::is('admin/sc') ? '' : 'hidden' }}"
                    aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ Request::is('admin/sc') ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ route('sc.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                    </path>
                </svg>
                <span class="ml-4">Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="flex flex-col flex-1 w-full">
        {{-- header --}}
        @include('components.header')
<main class="h-full pb-16 overflow-y-auto">

    @yield('content')
</main>
    </div>
</div>
