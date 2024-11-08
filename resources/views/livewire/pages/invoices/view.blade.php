<div>
    <section class="w-full px-3 antialiased lg:px-6">
        <div class="flex flex-col mx-auto max-w-7xl">
            {{-- @if (session('createdInvoiceAndRedirected')) --}}
            <div class="py-4 -mb-12" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition.duration.500ms>
                <p class="px-4 py-2 mx-auto my-4 text-xl font-semibold text-white bg-green-600 rounded-md">
                    You have successfully created the invoice below.</p>
            </div>
        {{-- @endif --}}
            <div class="pt-12 md:px-0">
                <x-typography.section-h2 class="tracking-wide text-gray-900 md:text-lg">
                    Previewing Invoice No: {{$invoice->invoice_number}}
                </x-typography.section-h2>
            </div>
        </div>
    </section>
    <livewire:partials.invoices.body :invoice="$invoice"/>
</div>