<x-layouts.app>
    <section>
        <div class="w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6">
            <div class="mx-auto max-w-7xl">
                <x-partials.header />
            </div>
        </div>
        <section class="w-full px-3 antialiased lg:px-6">
            <div class="flex flex-col mx-auto max-w-7xl">
                <div class="pt-12 mb-8 space-y-8 md:px-4 lg:mb-14">
                    <x-typography.section-h2 class="text-grey">
                        Create Invoice
                    </x-typography.section-h2>
                    <form action="" class="p-4 border border-gray-300 rounded-md">
                        @csrf
                        {{-- Invoice Details --}}
                        <div>
                            <p class="text-xl font-bold text-gray-900">Invoice Details</p>
                            <hr class="my-4 border-gray-300">
                            <div class="relative">
                                <x-inputs.label for="invoice_number">
                                    Invoice Number
                                </x-inputs.label>
                                <x-inputs.text name="invoice_number" placeholder="INV001" required type="text" />
                            </div>
                            <div class="relative mt-4">
                                <x-inputs.label for="invoice_date">
                                    Invoice Date
                                </x-inputs.label>
                                <x-inputs.text name="invoice_date" placeholder="10/10/24" required type="date" />
                            </div>
                            <div class="relative mt-4">
                                <x-inputs.label for="invoice_terms" optional>
                                    Invoice terms
                                </x-inputs.label>
                                <x-inputs.text name="invoice_terms" placeholder="On Receipt, one day, or due date"
                                    type="text" />
                            </div>
                        </div>

                        <hr class="h-1 my-8 bg-gray-200 border-gray-200">

                        {{-- Sender and recipient details section --}}
                        <div class="grid mt-4 space-y-8 md:grid-cols-2 md:space-x-4 md:space-y-0">
                            {{-- Sender --}}
                            <div class="">
                                <p class="text-xl font-bold text-gray-900">Your Details (Sender)</p>
                                <hr class="my-4 border-gray-300">
                                <div class="relative">
                                    <x-inputs.label for="sender_name">
                                        Your Name
                                    </x-inputs.label>
                                    <x-inputs.text name="sender_name" placeholder="John Doe" required type="text" />
                                </div>
                                <div class="relative mt-2">
                                    <x-inputs.label for="business_name" optional>
                                        Your Business Name
                                    </x-inputs.label>
                                    <div class="relative">
                                        <x-inputs.text name="business_name" placeholder="Business Doe" type="text" />
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <x-inputs.label for="sender_email">
                                        Your Email
                                    </x-inputs.label>
                                    <x-inputs.text name="sender_email" placeholder="john.doe@company.com" required
                                        type="email" />
                                </div>
                                <div class="relative mt-2">
                                    <x-inputs.label for="sender_tel">
                                        Your Phone Number
                                    </x-inputs.label>
                                    <div class="relative">
                                        <x-inputs.text name="sender_tel" placeholder="+..." required type="tel" />
                                    </div>
                                </div>
                                <div class="relative mt-2">
                                    <x-inputs.label for="sender_website" optional>
                                        Your Website
                                    </x-inputs.label>
                                    <div class="relative">
                                        <x-inputs.text name="sender_website" placeholder="https://www.yourbusiness.com"
                                            type="url" />
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <x-inputs.label for="business_number" optional>
                                        Business Number
                                    </x-inputs.label>
                                    <x-inputs.text name="business_number" placeholder="A3Be" type="text" />
                                </div>
                            </div>
                            {{-- Client --}}
                            <div class="">
                                <p class="text-xl font-bold text-gray-900">Client Details (Recipient)</p>
                                <hr class="my-4 border-gray-300">
                                <div class="relative mt-2">
                                    <x-inputs.label for="client_name">
                                        Client Name/Business name
                                    </x-inputs.label>
                                    <x-inputs.text name="client_name" placeholder="Client Doe" required
                                        type="text" />
                                </div>
                                <div class="relative mt-2">
                                    <x-inputs.label for="client_email">
                                        Client Email
                                    </x-inputs.label>
                                    <x-inputs.text name="client_email" placeholder="client@clientcompany.com" required
                                        type="email" />
                                </div>
                                <div class="relative mt-2">
                                    <x-inputs.label for="client_tel">
                                        Client Phone Number
                                    </x-inputs.label>
                                    <div class="relative">
                                        <x-inputs.text name="client_tel" placeholder="+..." required type="tel" />
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <x-inputs.label for="client_business_number" optional>
                                        Client Business Number
                                    </x-inputs.label>
                                    <x-inputs.text name="client_business_number" placeholder="A3Be" type="text" />
                                </div>
                            </div>
                        </div>

                        <hr class="h-1 my-8 bg-gray-200 border-gray-200">

                        {{-- Line items --}}
                        <div class="space-y-4">
                            youou
                            @foreach ($items as $index => $item)
                                {{-- Single Item --}}
                                <div class="flex space-x-4" wire:key="item-{{ $item['id'] }}">
                                    <input class="form-input" placeholder="Item name" type="text"
                                        wire:model="items.{{ $index }}.name">

                                    <input class="form-input" placeholder="Description" type="text"
                                        wire:model="items.{{ $index }}.description">

                                    <input class="w-24 form-input" type="number"
                                        wire:change="calculateTotal({{ $index }})"
                                        wire:model="items.{{ $index }}.quantity">

                                    <input class="w-32 form-input" step="0.01" type="number"
                                        wire:change="calculateTotal({{ $index }})"
                                        wire:model="items.{{ $index }}.price">

                                    <input class="w-24 form-input" type="number"
                                        wire:change="calculateTotal({{ $index }})"
                                        wire:model="items.{{ $index }}.discount">

                                    <input class="w-24 form-input" step="0.01" type="number"
                                        wire:change="calculateTotal({{ $index }})"
                                        wire:model="items.{{ $index }}.shipping">

                                    <span class="py-2">
                                        ${{ number_format($item['total'] ?? 0, 2) }}
                                    </span>

                                    <button class="text-red-500" wire:click="removeLineItem({{ $index }})">
                                        Remove
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-primary" wire:click="addLineItem">
                                Add Line Item
                            </button>
                        </div>

                        <div class="mt-4 text-xl font-bold">
                            Total: ${{ number_format($total, 2) }}
                        </div>

                        <hr class="h-1 my-8 bg-gray-200 border-gray-200">

                        <div class="mt-4 space-y-4">
                            <p class="text-xl font-bold text-gray-900">Additional Details</p>
                            <hr class="my-4 border-gray-300">
                            <div class="mt-2">
                                <x-inputs.label for="invoice_notes" optional>
                                    Notes
                                </x-inputs.label>
                                <x-inputs.textarea class="w-full p-2 border" name="invoice_notes"
                                    placeholder="Thank you" type="text" />
                            </div>
                            <div class="mt-2">
                                <x-inputs.label for="invoice_terms" optional>
                                    Terms and conditions
                                </x-inputs.label>
                                <x-inputs.textarea class="w-full p-2 border" name="invoice_terms"
                                    placeholder="Please make the payment by the due date." type="text" />
                            </div>
                        </div>

                        <hr class="h-1 my-8 bg-gray-200 border-gray-200">

                        {{-- Send button --}}
                        <div class="flex justify-end">
                            <x-buttons.btn btn="primary"
                                class="text-lg font-semibold text-black border-none gap-x-1 bg-accent hover:bg-accent hover:underline"
                                type="submit">
                                <span>Create Invoice</span>
                                <svg class="size-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </x-buttons.btn>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</x-layouts.app>
