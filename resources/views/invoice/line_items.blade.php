{{-- Line items --}}
<div class="mt-4 space-y-4">
    <p class="text-xl font-bold text-gray-900">Items/Services</p>
    <hr class="my-4 border-gray-300">
    {{-- Line items --}}
    <div class="mt-4" id="itemRows">
        {{-- Single Item --}}
        <div class="item-row mb-4 mt-4 flex flex-col rounded-md border-[2px] border-gray-300 p-4">
            <div>
                <x-inputs.label for="items[0][name]">
                    Item Name
                </x-inputs.label>
                <x-inputs.text class="p-2 border" name="items[0][name]" placeholder="Lawn chair, web development, etc"
                    required type="text" />
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
                    <x-inputs.text class="p-2 border" name="items[0][quantity]" placeholder="1" required
                        type="number" />
                </div>
                <div class="w-1/2">
                    <x-inputs.label for="items[0][quantity]">
                        Price (in currency)
                    </x-inputs.label>
                    <x-inputs.prepend class="p-2 border" name="items[0][price]" placeholder="30" required
                        type="number" />
                </div>
            </div>
            <div class="flex mt-2 space-x-4">
                <div class="w-1/2">
                    <x-inputs.label for="items[0][quantity]" optional>
                        Discount (Percentage)
                    </x-inputs.label>
                    <x-inputs.append class="p-2 border" name="items[0][discount]" placeholder="20" type="number" />
                </div>
                <div class="w-1/2">
                    <x-inputs.label for="items[0][shipping]" optional>
                        Shipping Cost (Percentage)
                    </x-inputs.label>
                    <x-inputs.append class="p-2 border" name="items[0][shipping]" placeholder="3" required
                        type="number" />
                </div>
            </div>

        </div>
    </div>
    <x-buttons.btn btn="primary" class="space-x-1" id="addRow">
        <span>Add Item</span>
        <svg class="size-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </x-buttons.btn>
</div>
