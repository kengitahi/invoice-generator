<nav class="flex w-full gap-2 px-6 py-4 bg-transparent navbar max-md:flex-col md:items-center">
    <div class="flex items-center justify-between max-md:w-full">
        <div class="items-center justify-between navbar-start max-md:w-full">
            <a class="text-xl font-semibold no-underline link link-neutral text-base-content/90" href="/">
                FlyonUI logo
            </a>

            <div class="flex items-center gap-3 md:hidden">
                <button aria-controls="navbar-collapse" aria-label="Toggle navigation"
                    class="collapse-toggle btn btn-square btn-secondary btn-outline btn-sm"
                    data-collapse="#navbar-collapse" type="button">
                    <span class="size-4 icon-[tabler--menu-2] collapse-open:hidden"></span>
                    <span class="size-4 icon-[tabler--x] hidden collapse-open:block"></span>
                </button>

                @guest
            <x-links.link class="items-center gap-1 md:hidden py-1.5" href="{{ route('login') }}" type="primary">
                Sign in
                <span class="icon-[tabler--login]"></span>
            </x-links.link>
        @endguest

                @auth
                    <livewire:partials.nav.user-dropdown />
                @endauth

            </div>
        </div>
    </div>

    <div class="collapse hidden grow basis-full overflow-hidden transition-[height] duration-300 md:navbar-end max-md:w-full"
        id="navbar-collapse">
        {{-- //TODO: Create link component and ensure different CSS for active links --}}
        <ul class="gap-2 p-0 text-base bg-black menu backdrop-blur-lg md:menu-horizontal md:bg-transparent">

            <a class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center text-white group md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3" href="{{ route('home') }}" wire:navigate>
                <span>Home</span>
                <span
                    class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
            <a class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out group hover:text-white md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3"
                href="/#features">
                <span>Features</span>
                <span
                    class="absolute bottom-0 w-0 h-px duration-300 ease-out translate-y-px left-1/2 bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 group-hover:left-0 group-hover:w-full md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
            <a class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out group hover:text-white md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3"
                href="{{ route('invoices.create') }}" wire:navigate>
                <span>Create Invoice</span>
                <span
                    class="absolute bottom-0 w-0 h-px duration-300 ease-out translate-y-px left-1/2 bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 group-hover:left-0 group-hover:w-full md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
            <a class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out group hover:text-white md:w-auto md:px-2 md:py-2 md:text-center lg:mx-3"
                href="{{ route('contact') }}" wire:navigate.live>
                <span>Contact</span>
                <span
                    class="absolute bottom-0 w-0 h-px duration-300 ease-out translate-y-px left-1/2 bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900 group-hover:left-0 group-hover:w-full md:from-gray-700 md:via-gray-400 md:to-gray-700"></span>
            </a>
        </ul>

        @guest
            <x-links.link class="items-center hidden gap-1 md:flex" href="{{ route('login') }}" type="primary">
                Sign in
                <span class="icon-[tabler--login]"></span>
            </x-links.link>
        @endguest

        @auth
            <div class="hidden md:flex">
                <livewire:partials.nav.user-dropdown />
            </div>
        @endauth

    </div>

</nav>
