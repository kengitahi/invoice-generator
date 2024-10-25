<section class="bg-gradient-to-brlg:px-6 w-full px-3 antialiased">
    <div class="mx-auto max-w-7xl text-center">
        <div class="container mx-auto flex flex-col gap-4 px-6 py-20 md:px-4">
            <x-typography.section-h2 class="text-gray-900">
                The New Standard for Invoicing
            </x-typography.section-h2>
            <x-typography.section-subheading>
                Ready to streamline your billing and boost your cash flow? Sign up now to create an invoice instantly
                and experience the power of effortless invoicing. No credit card required – just instant access to
                smarter, faster financial management.
            </x-typography.section-subheading>
            <div class="flex flex-col justify-center gap-2 sm:flex-row">
                <x-links.link :href="route('login')" class="group gap-2 text-lg" type="primary">
                    Sign In
                    <span
                        class="icon-[tabler--login] transition duration-300 ease-in-out group-hover:-translate-x-2"></span>
                </x-links.link>
                <x-links.link class="group border border-gray-500 text-lg transition duration-300 ease-in-out"
                    href="#features" type="secondary">
                    Learn More
                    <svg class="size-6 transition duration-300 ease-in-out group-hover:translate-x-2" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </x-links.link>
            </div>
        </div>
    </div>
</section>
