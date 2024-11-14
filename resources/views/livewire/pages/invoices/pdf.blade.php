<!-- Invoice -->
  <section class="px-4 py-8 pb-8 mx-auto sm:px-6 lg:px-8">
      <div class="flex w-full gap-4 mx-auto">
          <!-- Card -->
          <div class="flex flex-col w-full p-4 bg-white shadow-md rounded-xl sm:p-10">
              <!-- Grid -->
              <div class="flex justify-between">
                  <div>
                    @if ($invoice['invoice_logo'])
                        <img alt="Invoice number {{ $invoice['invoice_number'] }} logo"
                            class="h-auto max-w-[200px] rounded-md shadow-md"
                            src="{{ Storage::url($invoice['invoice_logo']) }}">
                    @endif
                  </div>

                  <!-- Col -->
                  <div class="text-end">
                    <h2 class="text-2xl font-semibold text-gray-800 md:text-3xl">
                        Invoice #{{ $invoice['invoice_number'] }}
                    </h2>

                      <!-- Col -->
                      <div class="mt-4 space-y-2 sm:text-end">
                          <!-- Grid -->
                          <div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
                              <dl class="grid gap-x-3 sm:grid-cols-5">
                                  <dt class="col-span-3 font-semibold text-gray-800">Invoice created on:</dt>
                                  <dd class="col-span-2 text-gray-500">{{ \Carbon\Carbon::parse($invoice['created_at'])->format('jS M, Y') }}</dd>
                              </dl>
                              <dl class="grid gap-x-3 sm:grid-cols-5">
                                  <dt class="col-span-3 font-semibold text-gray-800">Invoice due date:</dt>
                                  <dd class="col-span-2 text-gray-500">{{ \Carbon\Carbon::parse($invoice['invoice_date'])->format('jS M, Y') }}</dd>
                              </dl>
                          </div>
                          <!-- End Grid -->
                      </div>
                      <!-- Col -->

                      <!-- Col, sender details -->
                      <div class="mt-4">
                          <h3 class="text-lg font-semibold text-gray-800">Sent By:</h3>

                          <!-- Sender details -->
                          <h3 class="text-lg font-semibold text-gray-800">
                              @if ($invoice['sender_name'])
                                  {{ $invoice['sender_name'] }}<br>
                              @endif
                          </h3>

                          <address class="mt-2 not-italic text-gray-500">
                              @if ($invoice['sender_business_name'])
                                  {{ $invoice['sender_business_name'] }}
                              @endif
                              @if ($invoice['sender_business_number'])
                                  {{ $invoice['sender_business_number'] }}
                              @endif
                              @if ($invoice['sender_email'])
                                  {{ $invoice['sender_email'] }}<br>
                              @endif
                              @if ($invoice['sender_tel'])
                                  {{ $invoice['sender_tel'] }}<br>
                              @endif
                              @if ($invoice['sender_website'])
                                  {{ $invoice['sender_website'] }}<br>
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
                          @if ($invoice['client_name'])
                              {{ $invoice['client_name'] }}
                          @endif
                      </h3>
                      <address class="mt-2 not-italic text-gray-500">
                          @if ($invoice['client_name'])
                              {{ $invoice['client_name'] }}<br>
                          @endif
                          @if ($invoice['client_business_number'])
                              {{ $invoice['client_business_number'] }}<br>
                          @endif
                          @if ($invoice['client_email'])
                              {{ $invoice['client_email'] }}<br>
                          @endif
                          @if ($invoice['client_tel'])
                              {{ $invoice['client_tel'] }}<br>
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

                      @foreach ($invoice['items'] as $item)
                          <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
                              <div class="col-span-full sm:col-span-2">
                                  <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Item name</h5>
                                  <p class="font-medium text-gray-800">{{ $item['item_name'] }}</p>
                                  <h5 class="mt-2 text-xs font-medium text-gray-500 uppercase sm:hidden">Item description
                                  </h5>
                                  <p class="font-medium text-gray-600 text-md">{{ $item['item_description'] }}</p>
                              </div>
                              <div>
                                  <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Qty</h5>
                                  <p class="text-gray-800">{{ $item['item_quantity'] }}</p>
                              </div>
                              <div>
                                  <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Rate</h5>
                                  <p class="text-gray-800">${{ $item['item_price'] }}</p>
                              </div>
                              <div>
                                  <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden">Total</h5>
                                  <p class="text-gray-800 sm:text-end">
                                    ${{ number_format($item['item_quantity'] * $item['item_price'], 2) }}
                                  </p>
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
                  @if ($invoice['invoice_terms'])
                      <div>
                          <h4 class="text-lg font-semibold text-gray-800">Payment Terms</h4>
                          <p class="text-gray-500">{{ $invoice['invoice_terms'] }}</p>
                      </div>
                  @endif

                  @if ($invoice['invoice_conditions'])
                      <div>
                          <h4 class="text-lg font-semibold text-gray-800">Terms and Conditions</h4>
                          <p class="text-gray-500">{{ $invoice['invoice_conditions'] }}</p>
                      </div>
                  @endif

                  @if ($invoice['invoice_notes'])
                      <div>
                          <h4 class="text-lg font-semibold text-gray-800">Additional Notes</h4>
                          <p class="text-gray-500">{{ $invoice['invoice_notes'] }}</p>
                      </div>
                  @endif
              </div>

              <p class="mt-5 text-sm text-gray-500">© {{ \Carbon\Carbon::parse($invoice['updated_at'])->format('Y') }}
                  {{ $invoice['sender_name'] }}.
              </p>
          </div>
          <!-- End Card -->
      </div>
  </section>
  <!-- End Invoice-->
