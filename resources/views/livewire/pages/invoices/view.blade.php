<div>
    <section class="w-full px-3 antialiased lg:px-6">
        <div class="flex flex-col mx-auto max-w-7xl">
            <div class="pt-12 md:px-0">
                <x-typography.section-h2 class="tracking-wide text-gray-900 md:text-lg">
                    Previewing Invoice No: {{$invoice->invoice_number}}
                </x-typography.section-h2>
            </div>
        </div>
    </section>
    <livewire:partials.invoices.body :invoice="$invoice"/>
</div>