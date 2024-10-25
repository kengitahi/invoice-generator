<section class="w-full bg-gradient-to-br from-gray-900 via-black to-gray-800 px-3 antialiased lg:px-6" id="features">
    <div class="mx-auto flex max-w-7xl flex-col">
        <div class="container mx-auto mb-8 max-w-screen-lg space-y-4 px-6 pt-20 text-center md:px-4 lg:mb-14">
            <x-typography.section-h2>
                A Suite of Modern Invoicing Tools and Features
            </x-typography.section-h2>
            <x-typography.section-subheading>
                Enhance your business and provide customers and clients with a better invoicing experience.
            </x-typography.section-subheading>
        </div>
        <div class="container mx-auto mb-20 max-w-screen-lg space-y-4 px-6 md:px-4 lg:mb-16">
            <x-cards.feature href="{{route('invoices.create')}}" target="blank">
                <x-slot:image>
                    lady-holding-laptop-3.jpg
                </x-slot>
                <x-slot:title>
                    Lightning-Fast Invoice Creation
                </x-slot>
                <x-slot:body class="space-y-4">
                    <x-typography.card-paragraph>
                        Create professional invoices in seconds, not minutes. Our intuitive interface and smart
                        templates
                        adapt to your business, pre-filling client details and line items.
                    </x-typography.card-paragraph>

                    <x-typography.card-paragraph>
                        With just a few clicks, you'll
                        generate polished, branded invoices that impress clients and get you paid faster.
                    </x-typography.card-paragraph>
                </x-slot>
                <x-slot:linkText>
                    {{ auth()->check() ? 'Create Invoice' : 'Get Started' }}
                    <x-slot:icon>
                        <svg class="size-6 transition duration-300 ease-in-out group-hover:translate-x-2" fill="none"
                            stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </x-slot:icon>
                </x-slot>
            </x-cards.feature>
            <x-cards.feature href="{{ auth()->check() ? route('invoices.index') : route('invoices.create') }}" reverse
                target="blank">
                <x-slot:image>
                    lady-holding-laptop-3.jpg
                </x-slot>
                <x-slot:title>
                    Effortless Invoice Management
                </x-slot>
                <x-slot:body>
                    <x-typography.card-paragraph>
                        Create, preview, and email invoices to yourself in a flash. Generate sleek PDF invoices and send
                        them to clients with just a click.
                    </x-typography.card-paragraph>

                    <x-typography.card-paragraph>
                        Streamline your workflow and impress your customers with our
                        seamless, hassle-free invoicing experience.
                    </x-typography.card-paragraph>
                </x-slot>
                <x-slot:linkText>
                    {{ auth()->check() ? 'Manage Invoices' : 'Create Invoice' }}
                    <x-slot:icon>
                        <svg class="size-6 transition duration-300 ease-in-out group-hover:translate-x-2" fill="none"
                            stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </x-slot:icon>
                </x-slot>
            </x-cards.feature>
            <x-cards.feature href="{{ auth()->check() ? route('payments.index') : route('register') }}" target="blank">
                <x-slot:image>
                    lady-holding-laptop-3.jpg
                </x-slot>
                <x-slot:title>
                    Real-Time Payment Tracking
                </x-slot>
                <x-slot:body>
                    <x-typography.card-paragraph>
                        Say goodbye to chasing payments. Our dynamic dashboard gives you a bird's-eye view of your cash
                        flow.
                    </x-typography.card-paragraph>

                    <x-typography.card-paragraph>
                        Watch payments roll in real-time, set automated reminders for overdue invoices, and gain
                        valuable insights into your business's financial health—all from one central hub.
                    </x-typography.card-paragraph>
                </x-slot>
                <x-slot:linkText>
                    {{ auth()->check() ? 'Manage Payments' : 'Create Account' }}
                    <x-slot:icon>
                        <svg class="size-6 transition duration-300 ease-in-out group-hover:translate-x-2" fill="none"
                            stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </x-slot:icon>
                </x-slot>
            </x-cards.feature>
            <x-cards.feature href="{{ auth()->check() ? route('invoices.create') : route('register') }}" reverse
                target="blank">
                <x-slot:image>
                    lady-holding-laptop-3.jpg
                </x-slot>
                <x-slot:title>
                    Seamless Multi-Currency Support
                </x-slot>
                <x-slot:body>
                    <x-typography.card-paragraph>Go global without the headache. Our tool automatically handles currency
                        conversions, ensuring you and your international clients are always on the same page.
                    </x-typography.card-paragraph>

                    <x-typography.card-paragraph>Create invoices in several supported
                        currencies, track exchange rates effortlessly, and expand your business across borders with
                        confidence.
                    </x-typography.card-paragraph>
                </x-slot>
                <x-slot:linkText>
                    {{ auth()->check() ? 'Create Invoice' : 'Get Started' }}
                    <x-slot:icon>
                        <svg class="size-6 transition duration-300 ease-in-out group-hover:translate-x-2" fill="none"
                            stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </x-slot:icon>
                </x-slot>
            </x-cards.feature>
        </div>
    </div>
</section>
