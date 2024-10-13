<section class="w-full px-3 antialiased bg-gradient-to-brlg:px-6">
    <div class="mx-auto text-center max-w-7xl">
        <div class="container flex flex-col gap-4 px-6 py-20 mx-auto md:px-4">
            <x-typography.section-h2 class="text-grey">
                The New Standard for Invoicing
            </x-typography.section-h2>
            <x-typography.section-subheading>
                Ready to streamline your billing and boost your cash flow? Sign up now to create an invoice instantly
                and experience the power of effortless invoicing. No credit card required – just instant access to
                smarter, faster financial management.
            </x-typography.section-subheading>
            <div class="flex justify-center">
                <x-links.link :href="route('login')" class="gap-1 text-lg" type="primary">
                    Sign In
                    <svg class="size-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </x-links.link>
                <x-links.link
                    class="text-lg border border-gray-500 hover:border-transparent hover:bg-accent hover:text-white group"
                    href="#home-features" type="secondary">
                    Learn More
                    <svg class="hidden size-6 group-hover:block" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </x-links.link>
            </div>
        </div>
    </div>
</section>
