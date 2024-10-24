<nav class="navbar flex w-full gap-2 bg-transparent px-6 py-4 max-md:flex-col md:items-center">
    <div class="flex items-center justify-between max-md:w-full">
        <div class="navbar-start items-center justify-between max-md:w-full">
            <a class="link link-neutral text-xl font-semibold text-base-content/90 no-underline" href="/">
                FlyonUI
            </a>

            <div class="flex items-center gap-3 md:hidden">
                <button aria-controls="navbar-collapse" aria-label="Toggle navigation"
                    class="btn btn-square btn-secondary btn-outline collapse-toggle btn-sm"
                    data-collapse="#navbar-collapse" type="button">
                    <span class="size-4 icon-[tabler--menu-2] collapse-open:hidden"></span>
                    <span class="size-4 icon-[tabler--x] hidden collapse-open:block"></span>
                </button>

                <x-partials.nav.user-dropdown />

            </div>
        </div>
    </div>

    <div class="collapse hidden grow basis-full overflow-hidden transition-[height] duration-300 md:navbar-end max-md:w-full"
        id="navbar-collapse">
        <ul class="menu gap-2 bg-black md:bg-transparent p-0 text-base backdrop-blur-lg md:menu-horizontal">

            <a class="group relative mx-2 inline-block h-full w-full px-4 py-5 text-center font-medium leading-tight text-white md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3"
                href="/">
                <span>Home</span>
                <span
                    class="absolute bottom-0 left-0 h-px w-full translate-y-px bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 duration-300 ease-out md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
            <a class="group relative mx-2 inline-block h-full w-full px-4 py-5 text-center font-medium leading-tight duration-300 ease-out hover:text-white md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3"
                href="/#features">
                <span>Features</span>
                <span
                    class="absolute bottom-0 left-1/2 h-px w-0 translate-y-px bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 duration-300 ease-out group-hover:left-0 group-hover:w-full md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
            {{-- TODO: Reroute to login using middleware --}}
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
        </ul>
        <x-partials.nav.user-dropdown class="hidden md:flex" />
    </div>

</nav>
