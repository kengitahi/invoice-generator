<section class="w-full px-3 antialiased bg-gradient-to-brlg:px-6">
    <div class="mx-auto text-center max-w-7xl">
        <div class="container flex flex-col gap-4 px-6 py-20 mx-auto md:px-4">
            <x-typography.section-h2 class="text-gray-900">
                The New Standard for Invoicing
            </x-typography.section-h2>
            <x-typography.section-subheading>
                Ready to streamline your billing and boost your cash flow? Sign up now to create an invoice instantly
                and experience the power of effortless invoicing. No credit card required – just instant access to
                smarter, faster financial management.
            </x-typography.section-subheading>
            <div class="flex flex-col justify-center gap-2 sm:flex-row">
                @guest
                    <x-links.link :href="route('login')" class="gap-2 text-lg group" type="primary">
                    Sign In
                    <span class="icon-[tabler--login] transition duration-300 ease-in-out group-hover:-translate-x-2"></span>
                </x-links.link>
                <x-links.link class="text-lg transition duration-300 ease-in-out border border-gray-500 group"
                    href="#features" type="secondary">
                    Learn More
                    <svg class="transition duration-300 ease-in-out size-6 group-hover:translate-x-2" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </x-links.link>
                @endguest

                @auth
                    <x-links.link :href="route('invoices.create')" class="gap-2 text-lg group" type="primary">
                    Create Invoice
                    <svg class="transition duration-300 ease-in-out size-6 group-hover:translate-x-2" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </x-links.link>
                <x-links.link class="text-lg transition duration-300 ease-in-out border border-gray-500 group"
                    :href="route('invoices.index')" type="secondary">
                    Manage Invoices
                    <svg class="transition duration-300 ease-in-out size-6 group-hover:translate-x-2" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </x-links.link>
                @endauth
                
            </div>
        </div>
    </div>
</section>
