<!-- Invoice -->
<section class="mx-auto max-w-[85rem] px-4 pb-8 sm:my-10 sm:px-6 lg:px-8">
    <div class="flex w-full gap-4 mx-auto">
        <!-- Card -->
        <div class="flex w-full max-w-[80%] flex-col rounded-xl bg-white p-4 shadow-md sm:p-10">
            <!-- Grid -->
            <div class="flex justify-between">
                <div>
                    <img src="{{ Storage::url($invoice->sender_logo) }}" alt="Invoice number {{$invoice->invoice_number}} logo" class="max-w-[200px] h-auto  rounded-md shadow-md">
                </div>

                <!-- Col -->
                <div class="text-end">
                    <h2 class="text-2xl font-semibold text-gray-800 md:text-3xl">
                        Invoice #{{ $invoice->invoice_number }}
                    </h2>

                    <!-- Col -->
                    <div class="mt-4 space-y-2 sm:text-end">
                        <!-- Grid -->
                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
                            <dl class="grid gap-x-3 sm:grid-cols-5">
                                <dt class="col-span-3 font-semibold text-gray-800">Invoice created on:</dt>
                                <dd class="col-span-2 text-gray-500">{{ $invoice->created_at->format('jS M, Y') }}</dd>
                            </dl>
                            <dl class="grid gap-x-3 sm:grid-cols-5">
                                <dt class="col-span-3 font-semibold text-gray-800">Invoice due date:</dt>
                                <dd class="col-span-2 text-gray-500">{{ $invoice->invoice_date->format('jS M, Y') }}</dd>
                            </dl>
                        </div>
                        <!-- End Grid -->
                    </div>
                    <!-- Col -->

                    <!-- Col, sender details -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-gray-800">Sent By:</h3>

                        <h3 class="text-lg font-semibold text-gray-800">
                            @if ($invoice->sender_name)
                                {{ $invoice->sender_name }}<br>
                            @endif
                        </h3>

                        <address class="mt-2 not-italic text-gray-500">
                            @if ($invoice->sender_business_name)
                                {{ $invoice->sender_business_name }}<br>
                            @endif
                            @if ($invoice->sender_business_number)
                                {{ $invoice->sender_business_number }}<br>
                            @endif
                            @if ($invoice->sender_email)
                                {{ $invoice->sender_email }}<br>
                            @endif
                            @if ($invoice->sender_tel)
                                {{ $invoice->sender_tel }}<br>
                            @endif
                            @if ($invoice->sender_website)
                                {{ $invoice->sender_website }}<br>
                            @endif
                        </address>
                    </div>

                </div>
                <!-- Col -->
            </div>
            <!-- End Grid -->

            <!-- Grid, recipient details -->
            <div class="grid gap-3 mt-8 sm:grid-cols-2">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Bill to:</h3>
                    <h3 class="text-lg font-semibold text-gray-800">
                        @if ($invoice->client_name)
                            {{ $invoice->client_name }}
                        @endif
                    </h3>
                    <address class="mt-2 not-italic text-gray-500">
                        @if ($invoice->client_business_name)
                            {{ $invoice->client_business_name }}<br>
                        @endif
                        @if ($invoice->client_business_number)
                            {{ $invoice->client_business_number }}<br>
                        @endif
                        @if ($invoice->client_email)
                            {{ $invoice->client_email }}<br>
                        @endif
                        @if ($invoice->client_tel)
                            {{ $invoice->client_tel }}<br>
                        @endif
                    </address>
                </div>
            </div>
            <!-- End Grid -->

            <!-- Table -->
            <div class="mt-6">
                <div class="p-4 space-y-4 border border-gray-200 rounded-lg">
                    <div class="hidden sm:grid sm:grid-cols-5">
                        <div class="text-xs font-medium text-gray-500 uppercase sm:col-span-2">Item</div>
                        <div class="text-xs font-medium text-gray-500 uppercase text-start">Qty</div>
                        <div class="text-xs font-medium text-gray-500 uppercase text-start">Price</div>
                        <div class="text-xs font-medium text-gray-500 uppercase text-end">Amount</div>
                    </div>

                    <div class="hidden border-b border-gray-200 sm:block"></div>

                    @foreach ($invoice->items as $item)
                        <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
                            <div class="col-span-full sm:col-span-2">
                                <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Item name</h5>
                                <p class="font-medium text-gray-800">{{ $item->item_name }}</p>
                                <h5 class="mt-2 text-xs font-medium text-gray-500 uppercase sm:hidden">Item description
                                </h5>
                                <p class="font-medium text-gray-600 text-md">{{ $item->item_description }}</p>
                            </div>
                            <div>
                                <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Qty</h5>
                                <p class="text-gray-800">{{ $item->item_quantity }}</p>
                            </div>
                            <div>
                                <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Rate</h5>
                                <p class="text-gray-800">${{ $item->item_price }}</p>
                            </div>
                            <div>
                                <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Total</h5>
                                <p class="text-gray-800 sm:text-end">
                                    ${{ number_format($item->item_quantity * $item->item_price, 2) }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <!-- End Table -->

            <!-- Flex -->
            <div class="flex mt-8 sm:justify-end">
                <div class="w-full max-w-2xl space-y-2 sm:text-end">
                    <!-- Grid -->
                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
                        <dl class="grid gap-x-3 sm:grid-cols-5">
                            <dt class="col-span-3 font-semibold text-gray-800">Subtotal:</dt>
                            <dd class="col-span-2 text-gray-500">$2750.00</dd>
                        </dl>

                        <dl class="grid gap-x-3 sm:grid-cols-5">
                            <dt class="col-span-3 font-semibold text-gray-800">Total:</dt>
                            <dd class="col-span-2 text-gray-500">$2750.00</dd>
                        </dl>

                        <dl class="grid gap-x-3 sm:grid-cols-5">
                            <dt class="col-span-3 font-semibold text-gray-800">Tax:</dt>
                            <dd class="col-span-2 text-gray-500">$39.00</dd>
                        </dl>

                        <dl class="grid gap-x-3 sm:grid-cols-5">
                            <dt class="col-span-3 font-semibold text-gray-800">Amount paid:</dt>
                            <dd class="col-span-2 text-gray-500">$2789.00</dd>
                        </dl>

                        <dl class="grid gap-x-3 sm:grid-cols-5">
                            <dt class="col-span-3 font-semibold text-gray-800">Due balance:</dt>
                            <dd class="col-span-2 text-gray-500">$0.00</dd>
                        </dl>
                    </div>
                    <!-- End Grid -->
                </div>
            </div>
            <!-- End Flex -->

            <div class="mt-8 space-y-4 sm:mt-12">
                @if ($invoice->invoice_terms)
                <div>
                    <h4 class="text-lg font-semibold text-gray-800">Payment Terms</h4>
                    <p class="text-gray-500">{{ $invoice->invoice_terms }}</p>
                </div>
                @endif

                @if ($invoice->invoice_conditions)
                <div>
                    <h4 class="text-lg font-semibold text-gray-800">Terms and Conditions</h4>
                    <p class="text-gray-500">{{ $invoice->invoice_conditions }}</p>
                </div>
                @endif

                @if ($invoice->invoice_notes)
                <div>
                    <h4 class="text-lg font-semibold text-gray-800">Additional Notes</h4>
                    <p class="text-gray-500">{{ $invoice->invoice_notes }}</p>
                </div>
                @endif
            </div>

            <p class="mt-5 text-sm text-gray-500">© {{ $invoice->updated_at->format('Y') }} {{ $invoice->sender_name }}.</p>
        </div>
        <!-- End Card -->

        <!-- Buttons -->
        <div class="flex flex-col justify-start gap-3 mt-6">
            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                href="#" wire:navigate>
                <svg aria-hidden="true" class="size-4 shrink-0" fill="none" height="20" viewBox="0 0 24 24"
                    width="20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"
                        stroke-linecap="round" stroke-width="2" stroke="currentColor" />
                </svg>
                Send
            </a>

            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                href="#" wire:navigate>
                <svg class="size-4 shrink-0" fill="none" height="24" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                    width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                    <polyline points="7 10 12 15 17 10" />
                    <line x1="12" x2="12" y1="15" y2="3" />
                </svg>
                Download PDF
            </a>

            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                href="#" wire:navigate>
                <svg class="size-4 shrink-0" fill="none" height="24" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                    width="24" xmlns="http://www.w3.org/2000/svg">
                    <polyline points="6 9 6 2 18 2 18 9" />
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                    <rect height="8" width="12" x="6" y="14" />
                </svg>
                Print
            </a>

            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                href="{{ route('invoices.edit', $invoice->invoice_number) }}" wire:navigate.hover>
                <svg class="size-4" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Edit
            </a>

            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                href="{{ route('invoices.index') }}" wire:navigate.hover>
                <svg class="size-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                All Invoices
            </a>

        </div>
        <!-- End Buttons -->
    </div>
</section>
<!-- End Invoice-->
