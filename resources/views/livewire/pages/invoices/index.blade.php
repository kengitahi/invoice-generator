<x-app-layout>
<div>
    @if (session('success'))
        <p class="px-4 py-2 my-4 font-semibold text-white bg-green-600 rounded-md">You have successfully created an invoice</p>        
    @endif
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('All Invoices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("All Invoices hERE") }}
                </div>
            </div>
        </div>
    </div>
    All Invoices
</div>
</x-app-layout>