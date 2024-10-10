document.addEventListener('DOMContentLoaded', function () {
    const addRowButton = document.getElementById('addRow');
    const itemRows = document.getElementById('itemRows');
    let rowCount = 1;

    addRowButton.addEventListener('click', function () {
        const newRow = document.createElement('div');
        newRow.className = 'flex flex-col p-4 mt-4 mb-4 border-[2px] border-gray-300 rounded-md item-row';
        newRow.innerHTML = `        
        <div>
            <label class="block text-gray-900 text-md" for="items[${rowCount}][name]">
                Item Name
            </label>
            <input
                class="block w-full px-4 py-2 mt-2 text-base placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent focus:ring-opacity-90 "
                name="items[${rowCount}][name]" placeholder="Lawn chair, web development, etc" required type="text" />
        </div>

        <div class="mt-2">
            <label class="block text-gray-900 text-md" for="items[${rowCount}][description]">
                Item Description
                <small class="text-gray-400">(optional)</small>
            </label>
            <textarea
                class="block w-full px-4 py-2 mt-2 text-base placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent focus:ring-opacity-90"
                name="items[${rowCount}][description]" onInput="this.parentNode.dataset.clonedVal = this.value"
                placeholder="Description of rendered services or sold item"></textarea>
        </div>

        <div class="flex mt-2 space-x-4">
            <div class="w-1/2">
                <label class="block text-gray-900 text-md" for="items[${rowCount}][quantity]">
                    Quantity (Number)
                </label>
                <input
                    class="block w-full px-4 py-2 mt-2 text-base placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent focus:ring-opacity-90 "
                    name="items[${rowCount}][quantity]" placeholder="1" required type="number" />
            </div>
            
            <div class="w-1/2">
                <label class="block text-gray-900 text-md" for="items[${rowCount}][quantity]">
                    Price (in currency)
                </label>
                <div
                    class="flex items-center w-full px-4 mt-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent focus:ring-opacity-50 has-[:focus]:ring-1 has-[:focus]:ring-primary has-[:focus]:border-transparent has-[:focus]:ring-opacity-90">
                    <span>$</span>
                    <input
                        class="block w-full p-2 text-base placeholder-gray-400 border-0 border-transparent focus:ring-0 focus:ring-transparent"
                        name="items[${rowCount}][price]" placeholder="30" required type="number" />
                </div>
            </div>
        </div>
        
        <div class="flex mt-2 space-x-4">
            <div class="w-1/2">
                <label class="block text-gray-900 text-md" for="items[${rowCount}][discount]">
                    Discount (Percentage) 
                    <small class="text-gray-400">(optional)</small>
                </label>
                <div
                    class="flex items-center w-full px-4 mt-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent focus:ring-opacity-50 has-[:focus]:ring-1 has-[:focus]:ring-primary has-[:focus]:border-transparent has-[:focus]:ring-opacity-90">

                    <input
                        class="block w-full p-2 text-base placeholder-gray-400 border-0 border-transparent focus:ring-0 focus:ring-transparent"
                        name="items[${rowCount}][discount]" placeholder="30" required type="number" />
                    <span>%</span>
                </div>
            </div>
            
            <div class="w-1/2">
                <label class="block text-gray-900 text-md" for="items[${rowCount}][shipping]">
                    Shipping Cost (Percentage)
                    <small class="text-gray-400">(optional)</small>
                </label>
                <div
                    class="flex items-center w-full px-4 mt-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent focus:ring-opacity-50 has-[:focus]:ring-1 has-[:focus]:ring-primary has-[:focus]:border-transparent has-[:focus]:ring-opacity-90">

                    <input
                        class="block w-full p-2 text-base placeholder-gray-400 border-0 border-transparent focus:ring-0 focus:ring-transparent"
                        name="items[${rowCount}][shipping]" placeholder="3" required type="number" />
                    <span>%</span>
                </div>
            </div>
            
        </div>
            `;
        itemRows.appendChild(newRow);
        rowCount++;
    });
});