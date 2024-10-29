<!-- Invoice -->
<section class="mx-auto max-w-[85rem] px-4 pb-8 sm:my-10 sm:px-6 lg:px-8">
    <div class="flex w-full gap-4 mx-auto">
        <!-- Card -->
        <div class="flex w-full max-w-[80%] flex-col rounded-xl bg-white p-4 shadow-md sm:p-10">
            <!-- Grid -->
            <div class="flex justify-between">
                <div>
                    <svg class="size-10" fill="none" height="26" viewBox="0 0 26 26" width="26"
                        xmlns="http://www.w3.org/2000/svg">
                        <path class="stroke-blue-600"
                            d="M1 26V13C1 6.37258 6.37258 1 13 1C19.6274 1 25 6.37258 25 13C25 19.6274 19.6274 25 13 25H12"
                            stroke-width="2" stroke="currentColor" />
                        <path class="stroke-blue-600"
                            d="M5 26V13.16C5 8.65336 8.58172 5 13 5C17.4183 5 21 8.65336 21 13.16C21 17.6666 17.4183 21.32 13 21.32H12"
                            stroke-width="2" stroke="currentColor" />
                        <circle class="fill-blue-600" cx="13" cy="13.0214" fill="currentColor" r="5" />
                    </svg>

                    <h1 class="mt-2 text-lg font-semibold text-blue-600 md:text-xl">Preline Inc.</h1>
                </div>
                <!-- Col -->

                <div class="text-end">
                    <h2 class="text-2xl font-semibold text-gray-800 md:text-3xl">Invoice #</h2>
                    <span class="block mt-1 text-gray-500">invoice_number</span>

                    <address class="mt-4 not-italic text-gray-800">
                        45 Roker Terrace<br>
                        Latheronwheel<br>
                        KW5 8NW, London<br>
                        United Kingdom<br>
                    </address>
                </div>
                <!-- Col -->
            </div>
            <!-- End Grid -->

            <!-- Grid -->
            <div class="grid gap-3 mt-8 sm:grid-cols-2">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Bill to:</h3>
                    <h3 class="text-lg font-semibold text-gray-800">client_name</h3>
                    <address class="mt-2 not-italic text-gray-500">
                        280 Suzanne Throughway,<br>
                        Breannabury, OR 45801,<br>
                        United States<br>
                    </address>
                </div>
                <!-- Col -->

                <div class="space-y-2 sm:text-end">
                    <!-- Grid -->
                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
                        <dl class="grid gap-x-3 sm:grid-cols-5">
                            <dt class="col-span-3 font-semibold text-gray-800">Invoice date:</dt>
                            <dd class="col-span-2 text-gray-500">03/10/2018</dd>
                        </dl>
                        <dl class="grid gap-x-3 sm:grid-cols-5">
                            <dt class="col-span-3 font-semibold text-gray-800">Due date:</dt>
                            <dd class="col-span-2 text-gray-500">03/11/2018</dd>
                        </dl>
                    </div>
                    <!-- End Grid -->
                </div>
                <!-- Col -->
            </div>
            <!-- End Grid -->

            <!-- Table -->
            <div class="mt-6">
                <div class="p-4 space-y-4 border border-gray-200 rounded-lg">
                    <div class="hidden sm:grid sm:grid-cols-5">
                        <div class="text-xs font-medium text-gray-500 uppercase sm:col-span-2">Item</div>
                        <div class="text-xs font-medium text-gray-500 uppercase text-start">Qty</div>
                        <div class="text-xs font-medium text-gray-500 uppercase text-start">Rate</div>
                        <div class="text-xs font-medium text-gray-500 uppercase text-end">Amount</div>
                    </div>

                    <div class="hidden border-b border-gray-200 sm:block"></div>

                    <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
                        <div class="col-span-full sm:col-span-2">
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Item</h5>
                            <p class="font-medium text-gray-800">Design UX and UI</p>
                        </div>
                        <div>
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Qty</h5>
                            <p class="text-gray-800">1</p>
                        </div>
                        <div>
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Rate</h5>
                            <p class="text-gray-800">5</p>
                        </div>
                        <div>
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Amount</h5>
                            <p class="text-gray-800 sm:text-end">$500</p>
                        </div>
                    </div>

                    <div class="border-b border-gray-200 sm:hidden"></div>

                    <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
                        <div class="col-span-full sm:col-span-2">
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Item</h5>
                            <p class="font-medium text-gray-800">Web project</p>
                        </div>
                        <div>
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Qty</h5>
                            <p class="text-gray-800">1</p>
                        </div>
                        <div>
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Rate</h5>
                            <p class="text-gray-800">24</p>
                        </div>
                        <div>
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Amount</h5>
                            <p class="text-gray-800 sm:text-end">$1250</p>
                        </div>
                    </div>

                    <div class="border-b border-gray-200 sm:hidden"></div>

                    <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
                        <div class="col-span-full sm:col-span-2">
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Item</h5>
                            <p class="font-medium text-gray-800">SEO</p>
                        </div>
                        <div>
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Qty</h5>
                            <p class="text-gray-800">1</p>
                        </div>
                        <div>
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Rate</h5>
                            <p class="text-gray-800">6</p>
                        </div>
                        <div>
                            <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Amount</h5>
                            <p class="text-gray-800 sm:text-end">$2000</p>
                        </div>
                    </div>
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

            <div class="mt-8 sm:mt-12">
                <h4 class="text-lg font-semibold text-gray-800">Thank you!</h4>
                <p class="text-gray-500">If you have any questions concerning this invoice, use the following contact
                    information:</p>
                <div class="mt-2">
                    <p class="block text-sm font-medium text-gray-800">example@site.com</p>
                    <p class="block text-sm font-medium text-gray-800">+1 (062) 109-9222</p>
                </div>
            </div>

            <p class="mt-5 text-sm text-gray-500">© {{ now()->year }} {{ $invoice->client_name }}.</p>
        </div>
        <!-- End Card -->

        <!-- Buttons -->
        <div class="flex flex-col justify-start gap-3 mt-6">
            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50" href="#" wire:navigate>
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
                href="#" wire:navigate>
                <svg aria-hidden="true" class="size-4 shrink-0" fill="none" height="20" viewBox="0 0 24 24"
                    width="20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"
                        stroke-linecap="round" stroke-width="2" stroke="currentColor" />
                </svg>
                Send
            </a>
            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                href="{{route('invoices.edit', $invoice->invoice_number)}}" wire:navigate>
                <svg class="size-4" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Edit
            </a>
            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                href="{{route('invoices.index')}}" wire:navigate>
                <svg class="size-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Back To Invoices
            </a>
        </div>
        <!-- End Buttons -->
    </div>
</section>
<!-- End Invoice -->
