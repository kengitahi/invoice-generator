<section class="w-full bg-gradient-to-br from-gray-900 via-black to-gray-800 px-3 antialiased lg:px-6">
    <div class="mx-auto max-w-7xl">
        <x-partials.header />
        <div class="container mx-auto px-6 py-32 md:px-4 md:text-center">
            <h1
                class="font-heading text-4xl font-extrabold capitalize leading-none tracking-tight text-white sm:text-5xl md:text-6xl xl:text-7xl">
                <span class="block">Simplify how you create</span> <span
                    class="relative mt-3 inline-block text-white">and send invoices</span>
            </h1>
            <p
                class="mx-auto mt-6 text-left font-sans text-sm text-gray-200 sm:text-base md:mt-12 md:max-w-xl md:text-center md:text-lg xl:text-xl">
                If you are ready to change and simplify how you create and send invoices, then you'll want to use our
                invoice builder to
                make it fun and easy!
            </p>

            <div class="flex flex-col gap-2 min-[480px]:flex-row md:justify-center mt-4">
                <x-links.link :href="route('invoices.create')"
                    class="group border border-gray-500 text-lg transition duration-300 ease-in-out hover:border-transparent"
                    type="secondary">
                    Get Started
                    <svg class="size-6 transition duration-300 ease-in-out group-hover:translate-x-2" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </x-links.link>

                <x-links.link class="group gap-1 text-lg" href="#features" type="primary">
                    Learn More
                    <svg class="size-6 transition duration-300 ease-in-out group-hover:rotate-90" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </x-links.link>
            </div>
            <div class="mt-8 text-sm text-gray-300">By signing up, you agree to our terms and services.</div>
        </div>
    </div>
</section>
