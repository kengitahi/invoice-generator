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
                                <x-inputs.text name="client_name" placeholder="Client Doe" required type="text" />
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
                        @foreach ($items as $index => $item)
                            <div class="flex flex-col rounded-md border-[2px] border-gray-300 p-4"
                                wire:key="item-{{ $item['id'] }}">
                                <div>
                                    <x-inputs.label for="items.{{ $index }}.name">
                                        Item Name
                                    </x-inputs.label>
                                    <x-inputs.text class="p-2 border" name="items.{{ $index }}.name"
                                        placeholder="Lawn chair, web development, etc" required type="text"
                                        wire:model="items.{{ $index }}.name" />
                                </div>

                                <div class="mt-2">
                                    <x-inputs.label for="items.{{ $index }}.description" optional>
                                        Item Description
                                    </x-inputs.label>
                                    <x-inputs.textarea class="w-full p-2 border"
                                        name="items.{{ $index }}.description"
                                        placeholder="Description or additional details" type="text"
                                        wire:model="items.{{ $index }}.description" />
                                </div>

                                <div class="flex mt-2 space-x-4">
                                    <div class="w-1/2">
                                        <x-inputs.label for="items.{{ $index }}.quantity">
                                            Quantity (Number)
                                        </x-inputs.label>
                                        <x-inputs.text class="p-2 border" name="items.{{ $index }}.quantity"
                                            placeholder="1" required type="number"
                                            wire:change="calculateTotal({{ $index }})"
                                            wire:model="items.{{ $index }}.quantity" />
                                    </div>
                                    <div class="w-1/2">
                                        <x-inputs.label for="items.{{ $index }}.price">
                                            Price (in currency)
                                        </x-inputs.label>
                                        <x-inputs.prepend class="p-2 border" name="items.{{ $index }}.price"
                                            placeholder="30" required type="number"
                                            wire:change="calculateTotal({{ $index }})"
                                            wire:model="items.{{ $index }}.price" />
                                    </div>
                                </div>

                                <div class="flex mt-2 space-x-4">
                                    <div class="w-1/2">
                                        <x-inputs.label for="items.{{ $index }}.discount" optional>
                                            Discount (Percentage)
                                        </x-inputs.label>
                                        <x-inputs.append class="p-2 border" name="items.{{ $index }}.discount"
                                            placeholder="20" type="number"
                                            wire:change="calculateTotal({{ $index }})"
                                            wire:model="items.{{ $index }}.discount" />
                                    </div>
                                    <div class="w-1/2">
                                        <x-inputs.label for="items.{{ $index }}.shipping" optional>
                                            Shipping Cost (Percentage)
                                        </x-inputs.label>
                                        <x-inputs.append class="p-2 border" name="items.{{ $index }}.shipping"
                                            placeholder="3" required type="number"
                                            wire:change="calculateTotal({{ $index }})"
                                            wire:model="items.{{ $index }}.shipping" />
                                    </div>
                                </div>

                                <hr class="my-4 h-[2px] border-gray-200 bg-gray-200">

                                <div class="flex space-x-4 text-lg font-semibold">
                                    This Item's total <small class="text-gray-400"> (After discount and shipping)</small>: ${{ number_format($item['total'] ?? 0, 2) }}
                                </div>

                                <hr class="my-4 h-[2px] border-gray-200 bg-gray-200">

                                <div class="flex space-x-4">
                                    <x-buttons.btn btn="danger" class="gap-1 font-semibold"
                                        wire:click="removeLineItem({{ $index }})" disabled="{{count($items) <= 1 ? true : false}}" title="{{count($items) <= 1 ? 'The invoice should have at least one item' : 'Remove this item from the list'}}">
                                        Remove This Item
                                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path clip-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                fill-rule="evenodd" />
                                        </svg>
                                    </x-buttons.btn>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <x-buttons.btn btn="primary" class="gap-1 font-semibold" wire:click="addLineItem">
                            Add New Item
                            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                                    fill-rule="evenodd" />
                            </svg>

                        </x-buttons.btn>
                    </div>

                    <hr class="my-4 h-[2px] border-gray-200 bg-gray-200">

                    <div class="mt-4 text-xl font-bold">
                        Grand Total <small class="text-gray-400"> (After discount and shipping)</small>: ${{ number_format($total, 2) }}
                    </div>

                    <hr class="h-1 my-8 bg-gray-200 border-gray-200">

                    <div class="mt-4 space-y-4">
                        <p class="text-xl font-bold text-gray-900">Additional Details</p>
                        <hr class="my-4 border-gray-300">
                        <div class="mt-2">
                            <x-inputs.label for="invoice_notes" optional>
                                Notes
                            </x-inputs.label>
                            <x-inputs.textarea class="w-full p-2 border" name="invoice_notes" placeholder="Thank you"
                                type="text" />
                        </div>
                        <div class="mt-2">
                            <x-inputs.label for="invoice_terms" optional>
                                Terms and conditions
                            </x-inputs.label>
                            <x-inputs.textarea class="w-full p-2 border" name="invoice_terms"
                                placeholder="Please make the payment by the due date." type="text" />
                        </div>
                    </div>

                    <hr class="h-1 mb-8 bg-gray-200 border-gray-200">

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
