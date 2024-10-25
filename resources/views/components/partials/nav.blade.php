<nav class="flex h-24 w-full select-none items-center" x-data="{ showMenu: false }">
    <div
        class="relative mx-auto flex w-full flex-wrap items-start justify-between font-medium md:h-24 md:items-center md:justify-between">
        <a class="flex w-1/4 items-center space-x-2 py-4 pl-6 pr-4 font-extrabold text-white md:py-0" href="/">
            <span
                class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-white via-gray-200 to-white text-gray-900">
                <svg class="h-5 w-auto -translate-y-px" fill="none" viewBox="0 0 69 66"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m31.2 12.2-3.9 12.3-13.4.5-13.4.5 10.7 7.7L21.8 41l-3.9 12.1c-2.2 6.7-3.8 12.4-3.6 12.5.2.2 5-3 10.6-7.1 5.7-4.1 10.9-7.2 11.5-6.8.6.4 5.3 3.8 10.5 7.5 5.2 3.8 9.6 6.6 9.8 6.4.2-.2-1.4-5.8-3.6-12.5l-3.9-12.2 8.5-6.2c14.7-10.6 14.8-9.6-.4-9.7H44.2L40 12.5C37.7 5.6 35.7 0 35.5 0c-.3 0-2.2 5.5-4.3 12.2Z"
                        fill="currentColor" />
                </svg>
            </span>
            <span>LOGO</span>
        </a>
        <div :class="{ 'flex': showMenu, 'hidden md:flex': !showMenu }"
            class="absolute left-1/2 z-50 h-auto w-full -translate-x-1/2 flex-col items-center justify-center rounded-full border-0 border-gray-700 px-2 text-center text-gray-400 md:h-10 md:w-auto md:flex-row md:items-center md:border">
            <a class="group relative mx-2 inline-block h-full w-full px-4 py-5 text-center font-medium leading-tight text-white md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3"
                href="/">
                <span>Home</span>
                <span
                    class="absolute bottom-0 left-0 h-px w-full translate-y-px bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 duration-300 ease-out md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
            <a class="group relative mx-2 inline-block h-full w-full px-4 py-5 text-center font-medium leading-tight duration-300 ease-out hover:text-white md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3"
                href="#home-features">
                <span>Features</span>
                <span
                    class="absolute bottom-0 left-1/2 h-px w-0 translate-y-px bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 duration-300 ease-out group-hover:left-0 group-hover:w-full md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
            {{-- //TODO: Reroute to login using middleware --}}
            <a class="group relative mx-2 inline-block h-full w-full px-4 py-5 text-center font-medium leading-tight duration-300 ease-out hover:text-white md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3"
                href="{{ route('invoices.create') }}">
                <span>Create Invoice</span>
                <span
                    class="absolute bottom-0 left-1/2 h-px w-0 translate-y-px bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 duration-300 ease-out group-hover:left-0 group-hover:w-full md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
            <a class="group relative mx-2 inline-block h-full w-full px-4 py-5 text-center font-medium leading-tight duration-300 ease-out hover:text-white md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3"
                href="{{ route('contact') }}">
                <span>Contact</span>
                <span
                    class="absolute bottom-0 left-1/2 h-px w-0 translate-y-px bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 duration-300 ease-out group-hover:left-0 group-hover:w-full md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
        </div>
        <div :class="{ 'flex': showMenu, 'hidden': !showMenu }"
            class="fixed left-0 top-0 z-40 hidden h-full w-full items-center bg-gray-900 bg-opacity-50 p-3 text-sm md:relative md:flex md:w-auto md:bg-transparent md:p-0">
            <div
                class="h-full w-full select-none flex-col items-center overflow-hidden rounded-lg bg-black bg-opacity-50 p-3 backdrop-blur-lg md:relative md:flex md:h-auto md:flex-row md:overflow-auto md:rounded-none md:bg-transparent md:p-0">
                <div class="flex h-full w-full flex-col items-center justify-end pt-2 md:w-full md:flex-row md:py-0">
                    @auth
                        <x-partials.user-dropdown />
                    @endauth
                    @guest
                        <x-links.link :href="route('login')" type="tertiary">
                            Sign In
                        </x-links.link>
                        <x-links.link :href="route('register')" type="secondary">
                            Sign Up
                        </x-links.link>
                    @endguest
                </div>
            </div>
        </div>
        <div :class="{ 'text-gray-400': showMenu, 'text-gray-100': !showMenu }" @click="showMenu = !showMenu"
            class="absolute right-0 z-50 mr-4 flex h-10 w-10 translate-y-1.5 cursor-pointer flex-col items-end rounded-full p-2 hover:bg-gray-200/10 hover:bg-opacity-10 md:hidden">
            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                stroke="currentColor" viewBox="0 0 24 24" x-cloak x-show="!showMenu">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak x-show="showMenu"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                </path>
            </svg>
        </div>
    </div>
</nav>
