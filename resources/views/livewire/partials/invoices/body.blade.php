<!-- Invoice -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
  <div class="mx-auto sm:w-11/12 lg:w-3/4">
    <!-- Card -->
    <div class="flex flex-col p-4 bg-white shadow-md sm:p-10 rounded-xl dark:bg-neutral-800">
      <!-- Grid -->
      <div class="flex justify-between">
        <div>
          <svg class="size-10" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 26V13C1 6.37258 6.37258 1 13 1C19.6274 1 25 6.37258 25 13C25 19.6274 19.6274 25 13 25H12" class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2"/>
            <path d="M5 26V13.16C5 8.65336 8.58172 5 13 5C17.4183 5 21 8.65336 21 13.16C21 17.6666 17.4183 21.32 13 21.32H12" class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2"/>
            <circle cx="13" cy="13.0214" r="5" fill="currentColor" class="fill-blue-600 dark:fill-white"/>
          </svg>

          <h1 class="mt-2 text-lg font-semibold text-blue-600 md:text-xl dark:text-white">Preline Inc.</h1>
        </div>
        <!-- Col -->

        <div class="text-end">
          <h2 class="text-2xl font-semibold text-gray-800 md:text-3xl dark:text-neutral-200">Invoice #</h2>
          <span class="block mt-1 text-gray-500 dark:text-neutral-500">invoice_number</span>

          <address class="mt-4 not-italic text-gray-800 dark:text-neutral-200">
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
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Bill to:</h3>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">client_name</h3>
          <address class="mt-2 not-italic text-gray-500 dark:text-neutral-500">
            280 Suzanne Throughway,<br>
            Breannabury, OR 45801,<br>
            United States<br>
          </address>
        </div>
        <!-- Col -->

        <div class="space-y-2 sm:text-end">
          <!-- Grid -->
          <div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Invoice date:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">03/10/2018</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Due date:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">03/11/2018</dd>
            </dl>
          </div>
          <!-- End Grid -->
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

      <!-- Table -->
      <div class="mt-6">
        <div class="p-4 space-y-4 border border-gray-200 rounded-lg dark:border-neutral-700">
          <div class="hidden sm:grid sm:grid-cols-5">
            <div class="text-xs font-medium text-gray-500 uppercase sm:col-span-2 dark:text-neutral-500">Item</div>
            <div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">Qty</div>
            <div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">Rate</div>
            <div class="text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">Amount</div>
          </div>

          <div class="hidden border-b border-gray-200 sm:block dark:border-neutral-700"></div>

          <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
            <div class="col-span-full sm:col-span-2">
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Item</h5>
              <p class="font-medium text-gray-800 dark:text-neutral-200">Design UX and UI</p>
            </div>
            <div>
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Qty</h5>
              <p class="text-gray-800 dark:text-neutral-200">1</p>
            </div>
            <div>
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Rate</h5>
              <p class="text-gray-800 dark:text-neutral-200">5</p>
            </div>
            <div>
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Amount</h5>
              <p class="text-gray-800 sm:text-end dark:text-neutral-200">$500</p>
            </div>
          </div>

          <div class="border-b border-gray-200 sm:hidden dark:border-neutral-700"></div>

          <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
            <div class="col-span-full sm:col-span-2">
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Item</h5>
              <p class="font-medium text-gray-800 dark:text-neutral-200">Web project</p>
            </div>
            <div>
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Qty</h5>
              <p class="text-gray-800 dark:text-neutral-200">1</p>
            </div>
            <div>
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Rate</h5>
              <p class="text-gray-800 dark:text-neutral-200">24</p>
            </div>
            <div>
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Amount</h5>
              <p class="text-gray-800 sm:text-end dark:text-neutral-200">$1250</p>
            </div>
          </div>

          <div class="border-b border-gray-200 sm:hidden dark:border-neutral-700"></div>

          <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
            <div class="col-span-full sm:col-span-2">
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Item</h5>
              <p class="font-medium text-gray-800 dark:text-neutral-200">SEO</p>
            </div>
            <div>
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Qty</h5>
              <p class="text-gray-800 dark:text-neutral-200">1</p>
            </div>
            <div>
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Rate</h5>
              <p class="text-gray-800 dark:text-neutral-200">6</p>
            </div>
            <div>
              <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Amount</h5>
              <p class="text-gray-800 sm:text-end dark:text-neutral-200">$2000</p>
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
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Subtotal:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$2750.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Total:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$2750.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Tax:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$39.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Amount paid:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$2789.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Due balance:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$0.00</dd>
            </dl>
          </div>
          <!-- End Grid -->
        </div>
      </div>
      <!-- End Flex -->

      <div class="mt-8 sm:mt-12">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Thank you!</h4>
        <p class="text-gray-500 dark:text-neutral-500">If you have any questions concerning this invoice, use the following contact information:</p>
        <div class="mt-2">
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">example@site.com</p>
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">+1 (062) 109-9222</p>
        </div>
      </div>

      <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2022 Preline.</p>
    </div>
    <!-- End Card -->

    <!-- Buttons -->
    <div class="flex justify-end mt-6 gap-x-3">
      <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
        Invoice PDF
      </a>
      <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
        Print
      </a>
    </div>
    <!-- End Buttons -->
  </div>
</div>
<!-- End Invoice -->