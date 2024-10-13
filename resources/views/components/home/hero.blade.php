<section class="w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6">
    <div class="mx-auto max-w-7xl">
        <x-partials.header />
        <div class="container px-6 py-32 mx-auto md:text-center md:px-4">
            <h1
                class="text-4xl font-extrabold leading-none tracking-tight text-white capitalize sm:text-5xl md:text-6xl xl:text-7xl font-heading">
                <span class="block">Simplify how you create</span> <span
                    class="relative inline-block mt-3 text-white">and send invoices</span>
            </h1>
            <p
                class="mx-auto mt-6 font-sans text-sm text-left text-gray-200 md:text-center md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">
                If you are ready to change and simplify how you create and send invoices, then you'll want to use our
                invoice builder to
                make it fun and easy!</p>
            <div class="relative flex items-center mx-auto mt-8 overflow-hidden text-center md:justify-center">
                <div class="space-y-2">
                    <x-links.link type="secondary" :href="route('invoices.create')">
                        Get Started
                    </x-links.link>
                    <x-links.link type="primary" href="#home-features">
                        Learn More
                    </x-links.link>
                </div>
            </div>
            <div class="mt-8 text-sm text-gray-300">By signing up, you agree to our terms and services.</div>
        </div>
    </div>
</section>