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
                        {{-- Sender and recipient details section --}}
                        <div class="grid space-y-8 md:grid-cols-2 md:space-x-4 md:space-y-0">
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
                        <hr class="my-4 border-gray-300">
                        {{-- Line items --}}
                        <div class="mt-4 space-y-4 md:space-y-4">
                            <p class="text-xl font-bold text-gray-900">Items/Services</p>
                            {{-- Single Item --}}
                            <div class="p-4 mt-4 border border-gray-400 rounded-md" id="itemRows">
                                <div class="flex flex-col mb-4 item-row">
                                    <div>
                                        <x-inputs.label for="items[0][name]">
                                            Item Name
                                        </x-inputs.label>
                                        <x-inputs.text class="p-2 border" name="items[0][name]"
                                            placeholder="Lawn chair, web development, etc" required type="text" />
                                    </div>

                                    <div class="mt-2">
                                        <x-inputs.label for="items[0][description]" optional>
                                            Item Description
                                        </x-inputs.label>
                                        <x-inputs.textarea class="w-full p-2 border" name="items[0][description]"
                                            placeholder="Description or additional details" type="text" />
                                    </div>

                                    <div class="flex mt-2 space-x-4">
                                        <div class="w-1/2">
                                            <x-inputs.label for="items[0][quantity]">
                                                Quantity (Number)
                                            </x-inputs.label>
                                            <x-inputs.text class="p-2 border" name="items[0][quantity]"
                                                placeholder="1" required type="number" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-inputs.label for="items[0][quantity]">
                                                Price (in currency)
                                            </x-inputs.label>
                                            <x-inputs.prepend class="p-2 border" name="items[0][price]" placeholder="30"
                                                required type="number" />
                                        </div>
                                    </div>
                                    <div class="flex mt-2 space-x-4">
                                        <div class="w-1/2">
                                            <x-inputs.label for="items[0][quantity]" optional>
                                                Discount (Percentage)
                                            </x-inputs.label>
                                            <x-inputs.append class="p-2 border" name="items[0][discount]"
                                                placeholder="20" type="number" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-inputs.label for="items[0][shipping]">
                                                Shipping Cost (Percentage)
                                            </x-inputs.label>
                                            <x-inputs.append class="p-2 border " name="items[0][shipping]"
                                                placeholder="3" required type="number" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</x-layouts.app>
