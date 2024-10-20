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
                @if ($errors->any())
                    <div class="bg-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>

                </div>
                <form action="{{ route('invoices.store') }}" class="p-4 border border-gray-300 rounded-md" wire:submit='save'>
                    @csrf
                    {{-- Invoice Details --}}
                    <div>
                        <p class="text-2xl font-semibold text-gray-900">Invoice Details</p>
                        <hr class="my-4 border-gray-300">
                        <div class="relative">
                            <x-inputs.label for="invoice_number">
                                Invoice Number
                            </x-inputs.label>
                            <x-inputs.text name="invoice_number" placeholder="INV001" required type="text"
                                value="INV001" />
                        </div>
                        <div class="relative mt-4">
                            <x-inputs.label for="invoice_date">
                                Invoice Date
                            </x-inputs.label>
                            <x-inputs.text name="invoice_date" placeholder="10/10/24" required type="date" />
                        </div>
                        <div class="relative mt-4">
                            <x-inputs.label for="payment_terms" optional>
                                Payment terms
                            </x-inputs.label>
                            <x-inputs.text name="payment_terms" placeholder="On Receipt, one day, or due date, etc."
                                type="text" />
                        </div>
                    </div>

                    <hr class="h-1 my-8 bg-gray-200 border-gray-200">

                    {{-- Sender and recipient details section --}}
                    <div class="grid mt-4 space-y-8 md:grid-cols-2 md:space-x-4 md:space-y-0">
                        {{-- Sender --}}
                        <div class="">
                            <p class="text-2xl font-semibold text-gray-900">Your Details (Sender)</p>
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
                                <x-inputs.label for="sender_business_number" optional>
                                    Business Number
                                </x-inputs.label>
                                <x-inputs.text name="sender_business_number" placeholder="A3Be" type="text" />
                            </div>
                        </div>
                        {{-- Client --}}
                        <div class="">
                            <p class="text-2xl font-semibold text-gray-900">Client Details (Recipient)</p>
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
                    <div class="mt-4 space-y-4">
                        <p class="text-2xl font-semibold text-gray-900">Items/Services</p>
                        <hr class="my-4 border-gray-300">
                        {{-- Line items --}}
                        <div class="mt-4" id="itemRows">
                            {{-- Single Item --}}
                            <div class="item-row mb-4 mt-4 flex flex-col rounded-md border-[2px] border-gray-300 p-4" wire:key="item-0">
                                <div>
                                    <x-inputs.label for="item[0][name]">
                                        Item Name
                                    </x-inputs.label>
                                    <x-inputs.text class="p-2 border" name="item[0][name]"
                                        placeholder="Lawn chair, web development, etc" required type="text" />
                                </div>

                                <div class="mt-2">
                                    <x-inputs.label for="item[0][description]" optional>
                                        Item Description
                                    </x-inputs.label>
                                    <x-inputs.textarea class="w-full p-2 border" name="item[0][description]"
                                        placeholder="Description or additional details" type="text" />
                                </div>

                                <div class="flex mt-2 space-x-4">
                                    <div class="w-1/2">
                                        <x-inputs.label for="item[0][quantity]">
                                            Quantity (Number)
                                        </x-inputs.label>
                                        <x-inputs.text class="p-2 border" name="item[0][quantity]" placeholder="1"
                                            required type="number" />
                                    </div>
                                    <div class="w-1/2">
                                        <x-inputs.label for="item[0][price]">
                                            Price (in currency)
                                        </x-inputs.label>
                                        <x-inputs.prepend class="p-2 border" name="item[0][price]" placeholder="30" required type="number" wire:model='price' wire:change='calculateTotal'/>
                                    </div>
                                </div>
                                <p>The price is {{$price}}</p>
                                <p>The total is {{$total}}</p>
                                <div class="flex mt-2 space-x-4">
                                    <div class="w-1/2">
                                        <x-inputs.label for="item[0][discount]" optional>
                                            Discount (Percentage)
                                        </x-inputs.label>
                                        <x-inputs.append class="p-2 border" name="item[0][discount]" placeholder="20"
                                            type="number" />
                                    </div>
                                    <div class="w-1/2">
                                        <x-inputs.label for="item[0][shipping]" optional>
                                            Shipping Cost (Percentage)
                                        </x-inputs.label>
                                        <x-inputs.append class="p-2 border" name="item[0][shipping]" placeholder="3"
                                            required type="number" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-buttons.btn btn="primary" class="space-x-1" id="addRow">
                            <span>Add Item</span>
                            <svg class="size-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </x-buttons.btn>

                        <hr class="h-1 my-8 bg-gray-200 border-gray-200">

                        <div class="flex flex-col mt-2 space-x-4">
                            <p class="text-2xl font-semibold text-gray-900">Totals</p>
                            <hr class="my-4 border-gray-300">
                            <div class="mt-4 space-y-2">
                                <div class="grid grid-cols-[1fr_3fr] items-center">
                                    <x-inputs.label for="sub_total">
                                        Subtotal
                                    </x-inputs.label>
                                    <div class="flex items-center text-2xl ">
                                        <span>$</span>
                                        <input disable class='flex items-center gap-1 p-2 text-2xl font-semibold border border-transparent rounded-none border-b-gray-300' placeholder="$0.00" value="{{ $sub_total }}" disabled>
                                    </div>
                                </div>
                                <div class="grid grid-cols-[1fr_3fr] items-center">
                                    <x-inputs.label class="text-2xl">
                                        Total
                                    </x-inputs.label>
                                    <div class="flex items-center text-2xl ">
                                        <span>$</span>
                                        <input disable class='flex items-center gap-1 p-2 text-2xl font-semibold border border-transparent rounded-none border-b-gray-300' placeholder="$0.00" value="{{ $total }}" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr class="h-1 my-8 bg-gray-200 border-gray-200">

                    <div class="mt-4 space-y-4">
                        <p class="text-2xl font-semibold text-gray-900">Additional Details</p>
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

                    <x-inputs.textarea class="hidden" name="user_id" value="{{ Auth::user()->id }}" />

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
