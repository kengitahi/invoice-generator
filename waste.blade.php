<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div>
        <div>
            <label class="block text-gray-900 text-md" for="items[${rowCount}][name]">
                Item Name
            </label>
            <input
                class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                name="items[${rowCount}][name]" placeholder="Lawn chair, web development, etc" required type="text" />
        </div>

        <div class="mt-2">
            <label class="block text-gray-900 text-md" for="items[${rowCount}][description]" optional>
                Item Description
                <small class="text-gray-400">(optional)</small>
            </label>
            <textarea
                class="block w-full px-4 py-2 mt-2 text-base placeholder-gray-400 border border-gray-300 rounded-md focus:border-transparentfocus:ring-opacity-50 focus:outline-none focus:ring-1 focus:ring-primary"
                name="items[${rowCount}][description]" onInput="this.parentNode.dataset.clonedVal = this.value"
                placeholder="Description of rendered services or sold item"></textarea>
        </div>

        <div class="flex mt-2 space-x-4">
            <div class="w-1/2">
                <label class="block text-gray-900 text-md" for="items[${rowCount}][quantity]">
                    Quantity (Number)
                </label>
                <input
                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    name="items[${rowCount}][quantity]" placeholder="1" required type="number" />
            </div>
            <div class="w-1/2">
                <label class="block text-gray-900 text-md" for="items[${rowCount}][quantity]">
                    Price (in currency)
                </label>
                <div
                    class="flex items-center w-full px-4 text-base border border-gray-300 rounded-md focus:border-transparent focus:outline-none focus:ring-1 focus:ring-primary focus:ring-opacity-50">
                    <span>$</span>
                    <input
                        class="block w-full p-2 text-base placeholder-gray-400 border-0 border-transparent focus:ring-0 focus:ring-transparent"
                        name="items[${rowCount}][price]" placeholder="30" required type="number" />
                </div>
            </div>
        </div>
        <div class="flex mt-2 space-x-4">
            <div class="w-1/2">
                <label class="block text-gray-900 text-md" for="items[${rowCount}][quantity]" optional>
                    Discount (Percentage)
                </label>
                <div
                    class="flex items-center w-full px-4 text-base border border-gray-300 rounded-md focus:border-transparent focus:outline-none focus:ring-1 focus:ring-primary focus:ring-opacity-50">

                    <input
                        class="block w-full p-2 text-base placeholder-gray-400 border-0 border-transparent focus:ring-0 focus:ring-transparent"
                        name="items[${rowCount}][discount]" placeholder="30" required type="number" />
                    <span>%</span>
                </div>
            </div>
            <div class="w-1/2">
                <label class="block text-gray-900 text-md" for="items[${rowCount}][shipping]">
                    Shipping Cost (Percentage)
                </label>
                <div
                    class="flex items-center w-full px-4 text-base border border-gray-300 rounded-md focus:border-transparent focus:outline-none focus:ring-1 focus:ring-primary focus:ring-opacity-50">

                    <input
                        class="block w-full p-2 text-base placeholder-gray-400 border-0 border-transparent focus:ring-0 focus:ring-transparent"
                        name="items[${rowCount}][shipping]" placeholder="3" required type="number" />
                    <span>%</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
