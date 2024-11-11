<section>
    <div class="w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6">
        <div class="mx-auto max-w-7xl">
            <x-partials.header />
        </div>
    </div>
    <section class="w-full px-3 antialiased lg:px-6">
        <div class="flex flex-col mx-auto max-w-7xl">
            <div class="pt-12 mb-8 space-y-8 md:px-4 lg:mb-14">
                <x-typography.section-h2 class="text-gray-900">
                    Create Invoice
                </x-typography.section-h2>
                @if ($errors->any())
                    <div class="p-4 bg-red-500 rounded-md">
                        <ul class="list-disc">
                            @foreach ($errors->all() as $error)
                                <li class="ml-4 text-lg font-semibold tracking-wider text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="p-4 border border-gray-300 rounded-md" wire:submit.prevent="createInvoice">
                    @csrf
                    {{-- Invoice Details --}}
                    <div>
                        <p class="text-xl font-bold text-gray-900">Invoice Details</p>
                        <hr class="my-4 border-gray-300">
                        <div class="relative">
                            <x-inputs.label for="invoice_number">
                                Invoice Number
                            </x-inputs.label>
                            <x-inputs.text name="invoice_number" placeholder="INV001" required type="text"
                                wire:model="invoice_number" />
                        </div>
                        <div class="relative mt-4">
                            <x-inputs.label for="invoice_date">
                                Invoice Date
                            </x-inputs.label>
                            <x-inputs.text name="invoice_date" placeholder="10/10/24" required type="date"
                                wire:model="invoice_date" />
                        </div>
                        <div class="relative mt-4">
                            <x-inputs.label for="invoice_terms" optional>
                                Payment terms
                            </x-inputs.label>
                            <x-inputs.text name="invoice_terms" placeholder="On Receipt, one day, due date, etc."
                                type="text" wire:model="invoice_terms" />
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
                                <x-inputs.text name="sender_name" placeholder="John Doe" required type="text"
                                    wire:model="sender_name" />
                            </div>
                            <div class="relative mt-2">
                                <x-inputs.label for="sender_business_name" optional>
                                    Your Business Name
                                </x-inputs.label>
                                <div class="relative">
                                    <x-inputs.text name="sender_business_name" placeholder="Business Doe" type="text"
                                        wire:model="sender_business_name" />
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-inputs.label for="sender_email">
                                    Your Email
                                </x-inputs.label>
                                <x-inputs.text name="sender_email" placeholder="john.doe@company.com" required
                                    type="email" wire:model="sender_email" />
                            </div>

                            <!-- Logo -->
                            @if(Auth::user()->sender_logo && !$invoice_logo)
                            <div class="mt-4">
                                  <x-inputs.label :value="__('Current Logo')" for="avatar" />
                                  <p class="block mb-2 text-sm font-medium text-gray-700">This logo will be shown on the invoice</p>
                                  <img alt="User Logo" class="block max-h-[200px] rounded-md border-gray-300 shadow-sm"
                                      src="{{ Storage::url(Auth::user()->sender_logo) }}">
                              </div>
                            @endif
                            <div class="mt-4">
                              @if(!$invoice_logo)
                              <x-inputs.label :value="__('Choose a Logo')" for="invoice_logo" />
                              @else
                              <x-inputs.label :value="__('Choose Another Logo')" for="invoice_logo" />
                              @endif

                              @if(Auth::user()->sender_logo && !$invoice_logo)
                              <p class="block mb-2 text-sm font-medium text-gray-700">The logo you choose below will be shown on the invoice instead of the one above</p>
                              @endif

                              <x-text-input class="block w-full mt-1" id="invoice_logo" name="invoice_logo" type="file" wire:model="invoice_logo" />
                              <x-input-error :messages="$errors->get('invoice_logo')" class="mt-2" />
                            </div>

                            @if ($invoice_logo)
                                <div class="mt-4">
                                  <x-inputs.label :value="__('Logo Preview')"/>
                                    <p class="block mb-2 text-sm font-medium text-gray-700">This logo will be shown on the invoice</p>
                                    <img class="block max-h-[200px] rounded-md border-gray-300 shadow-sm"
                                        src="{{ $invoice_logo->temporaryUrl() }}">
                                </div>
                            @endif

                            <div class="relative mt-2">
                                <x-inputs.label for="sender_tel">
                                    Your Phone Number
                                </x-inputs.label>
                                <div class="relative">
                                    <x-inputs.text name="sender_tel" placeholder="+..." required type="tel"
                                        wire:model="sender_tel" />
                                </div>
                            </div>
                            <div class="relative mt-2">
                                <x-inputs.label for="sender_website" optional>
                                    Your Website
                                </x-inputs.label>
                                <div class="relative">
                                    <x-inputs.text name="sender_website" placeholder="https://www.yourbusiness.com"
                                        type="url" wire:model="sender_website" />
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-inputs.label for="sender_business_number" optional>
                                    Business Number
                                </x-inputs.label>
                                <x-inputs.text name="sender_business_number" placeholder="A3Be" type="text"
                                    wire:model="sender_business_number" />
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
                                <x-inputs.text name="client_name" placeholder="Client Doe" required type="text"
                                    wire:model="client_name" />
                            </div>
                            <div class="relative mt-2">
                                <x-inputs.label for="client_email">
                                    Client Email
                                </x-inputs.label>
                                <x-inputs.text name="client_email" placeholder="client@clientcompany.com" required
                                    type="email" wire:model="client_email" />
                            </div>
                            <div class="relative mt-2">
                                <x-inputs.label for="client_tel">
                                    Client Phone Number
                                </x-inputs.label>
                                <x-inputs.text name="client_tel" placeholder="+..." required type="tel"
                                    wire:model="client_tel" />
                            </div>
                            <div class="mt-2">
                                <x-inputs.label for="client_business_number" optional>
                                    Client Business Number
                                </x-inputs.label>
                                <x-inputs.text name="client_business_number" placeholder="A3Be" type="text"
                                    wire:model="client_business_number" />
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

                                <div class="flex flex-col gap-4 mt-2 md:flex-row md:gap-0 md:space-x-4">
                                    <div class="w-full md:w-1/2">
                                        <x-inputs.label for="items.{{ $index }}.quantity">
                                            Quantity (Number of Items)
                                        </x-inputs.label>
                                        <x-inputs.text class="p-2 border" name="items.{{ $index }}.quantity"
                                            placeholder="1" required type="number"
                                            wire:change="calculateTotal({{ $index }})"
                                            wire:model="items.{{ $index }}.quantity" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-inputs.label for="items.{{ $index }}.price">
                                            Price (in currency)
                                        </x-inputs.label>
                                        <x-inputs.prepend class="p-2 border" name="items.{{ $index }}.price"
                                            placeholder="30" required type="number"
                                            wire:change="calculateTotal({{ $index }})"
                                            wire:model="items.{{ $index }}.price" />
                                    </div>
                                </div>

                                <div class="flex flex-col gap-4 mt-2 md:flex-row md:gap-0 md:space-x-4">
                                    <div class="w-full md:w-1/2">
                                        <x-inputs.label for="items.{{ $index }}.discount" optional>
                                            Discount (Percentage)
                                        </x-inputs.label>
                                        <x-inputs.append class="p-2 border" name="items.{{ $index }}.discount"
                                            placeholder="20" type="number"
                                            wire:change="calculateTotal({{ $index }})"
                                            wire:model="items.{{ $index }}.discount" />
                                        @if ($discountError)
                                            <p class="mt-2 text-red-500">The discount should be between 0 and 100%</p>
                                        @endif
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-inputs.label for="items.{{ $index }}.shipping" optional>
                                            Shipping Cost (in currency)
                                        </x-inputs.label>
                                        <x-inputs.prepend class="p-2 border"
                                            name="items.{{ $index }}.shipping" placeholder="3" required
                                            type="number" wire:change="calculateTotal({{ $index }})"
                                            wire:model="items.{{ $index }}.shipping" />
                                    </div>
                                </div>

                                <hr class="my-4 h-[2px] border-gray-200 bg-gray-200">

                                <div class="flex space-x-4 text-lg font-semibold text-gray-900">
                                    This Item's total <small class="text-gray-400"> (After discount and
                                        shipping)</small>: ${{ number_format($item['total'] ?? 0, 2) }}
                                </div>

                                <hr class="my-4 h-[2px] border-gray-200 bg-gray-200">

                                <div class="flex space-x-4">
                                    <x-buttons.btn btn="danger" class="gap-1 font-semibold"
                                        disabled="{{ count($items) <= 1 ? true : false }}"
                                        title="{{ count($items) <= 1 ? 'The invoice should have at least one item' : 'Remove this item from the list' }}"
                                        wire:click="removeLineItem({{ $index }})">
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

                    {{-- Add new item button --}}
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

                    {{-- Grand total --}}
                    <div class="flex gap-2 mt-4 text-xl font-bold text-gray-900">
                        <x-inputs.label class="flex flex-col" for="grand_total">
                            <span>
                                Grand Total:
                            </span>

                            <small class="font-semibold text-gray-400">
                                (After discount and shipping)
                            </small>
                        </x-inputs.label>

                        <div
                            class='has-[:focus]:ring-1 has-[:focus]:ring-primary has-[:focus]:border-transparent has-[:focus]:ring-opacity-90 mt-2 flex w-full items-center border-0 border-gray-400 px-4 text-base focus:border-transparent focus:outline-none focus:ring-1 focus:ring-primary focus:ring-opacity-50'>
                            <span class="font-bold text-gray-900">$</span>
                            <p
                                class='m-0 flex items-center rounded-none border-0 border-b-4 border-gray-800 pb-0 !text-3xl'>
                                {{ number_format($grand_total, 2) }}
                            </p>
                        </div>

                        <input hidden name="grand_total" step="0.01" type="number"
                            value="{{ number_format($grand_total, 2) }}" wire:model="grand_total">
                    </div>

                    <hr class="h-1 my-8 bg-gray-200 border-gray-200">

                    {{-- Additional details section, notes and conditions --}}
                    <div class="mt-4 space-y-4">
                        <p class="text-xl font-bold text-gray-900">Additional Details</p>
                        <hr class="my-4 border-gray-300">
                        <div class="mt-2">
                            <x-inputs.label for="invoice_notes" optional>
                                Notes
                            </x-inputs.label>
                            <x-inputs.textarea class="w-full p-2 border" name="invoice_notes" placeholder="Thank you"
                                wire:model='invoice_notes' />
                        </div>

                        <div class="mt-2">
                            <x-inputs.label for="invoice_conditions" optional>
                                Terms and conditions
                            </x-inputs.label>
                            <x-inputs.textarea class="w-full p-2 border" name="invoice_conditions"
                                placeholder="Please make the payment by the due date." type="text"
                                wire:model='invoice_conditions' />
                        </div>
                    </div>

                    <hr class="h-1 mb-8 bg-gray-200 border-gray-200">

                    @if (!$totalError)
                        {{-- Create button --}}
                        <div class="flex gap-4">
                            <div class="flex flex-col justify-end">
                                <x-buttons.btn btn="primary"
                                    class="group !w-fit gap-x-1 border-none bg-accent text-lg font-semibold text-black transition duration-300 ease-in-out hover:bg-accent hover:underline"
                                    type="submit">
                                    <span>Create Invoice</span>
                                    <svg class="transition duration-300 ease-in-out size-6 group-hover:translate-x-2"
                                        fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </x-buttons.btn>
                            </div>

                            <div class="flex flex-col justify-end">
                                <x-buttons.btn btn="primary"
                                    class="group !w-fit gap-x-1 border-none bg-primary text-lg font-semibold text-white transition duration-300 ease-in-out hover:underline"
                                    type="submit" wire:click="redirectTo = true">
                                    <span>Create and View Invoice</span>
                                    <svg class="transition duration-300 ease-in-out size-6 group-hover:translate-x-2"
                                        fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </x-buttons.btn>
                            </div>
                        </div>
                        <div class="pl-4 mt-2 text-lg font-semibold text-gray-600" wire:loading.delay.long
                            wire:target="createInvoice">
                            We are creating your invoice. You will be redirected in a few seconds.
                        </div>
                    @else
                        <div class="flex justify-end">
                            <div class="flex flex-col space-y-2 text-center">
                                <x-buttons.btn btn="danger"
                                    class="text-lg font-semibold text-white transition duration-300 ease-in-out border-none group gap-x-1 hover:underline"
                                    disabled>
                                    Cannot Create Invoice
                                    <svg class="size-6" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path clip-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                            fill-rule="evenodd" />
                                    </svg>
                                </x-buttons.btn>
                                <small class="text-gray-400">Please correct the errors above.</small>
                            </div>

                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
</section>
