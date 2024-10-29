@php
    // dd($invoices);
@endphp

<x-app-layout>
    <div>
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Your Sent Invoices') }}
            </h2>
        </x-slot>

        @if (session('success'))
            <div class="py-4" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition.duration.500ms>
                <p class="mx-auto my-4 max-w-[80%] rounded-md bg-green-600 px-4 py-2 text-lg font-semibold text-white">
                    You have successfully created an invoice</p>
            </div>
        @endif

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

                @if ($invoices->count() > 0)
                    <div class="pb-4 text-right">
                    <x-links.link :href="route('invoices.create')"
                        class="transition duration-300 ease-in-out text-md group hover:border-transparent"
                        type="primary">
                        Create a New Invoice
                        <svg class="transition duration-300 ease-in-out size-4 group-hover:translate-x-2" fill="none"
                            stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </x-links.link>
                </div>
                @endif

                

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @if (count($invoices) == 0)
                            <div>
                                <p class="mb-2 text-xl font-semibold leading-tight text-gray-800">
                                    You have not created any invoices yet
                                </p>

                                <x-links.link :href="route('invoices.create')"
                                    class="transition duration-300 ease-in-out text-md group hover:border-transparent"
                                    type="primary">
                                    Create an Invoice
                                    <svg class="transition duration-300 ease-in-out size-4 group-hover:translate-x-2"
                                        fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </x-links.link>
                            </div>
                        @else
                            <div class="overflow-x-scroll">
                                <table class="w-full rounded-md table-auto">
                                    <thead>
                                        <tr class="text-left bg-gray-100">
                                            <th class="px-4 py-2">Invoice Number</th>
                                            <th class="px-4 py-2">Invoice Date</th>
                                            <th class="px-4 py-2">Client Details</th>
                                            <th class="px-4 py-2">Invoice Status</th>
                                            <th class="px-4 py-2">Invoice Total</th>
                                            <th class="px-4 py-2">Invoice Updated On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice)
                                            <tr class="mb-4">
                                                <td class="px-4 py-2 border">
                                                    {{ $invoice->invoice_number }}
                                                </td>
                                                <td class="px-4 py-2 border">
                                                    <small>

                                                    </small>
                                                    {{ $invoice->created_at->format('d F, Y') }}
                                                </td>
                                                <td class="px-4 py-2 border">
                                                    {{ $invoice->client_name }}
                                                    <br />
                                                    <small>
                                                        {{ $invoice->client_email }}
                                                    </small>
                                                </td>
                                                <td class="px-4 py-2 border">
                                                    Status
                                                    <br />
                                                    <small>
                                                        Due on {{ $invoice->invoice_date->format('jS M, Y') }}
                                                    </small>
                                                </td>
                                                <td class="px-4 py-2 border">
                                                    ${{ number_format($invoice->grand_total, 2) }}
                                                </td>
                                                <td class="px-4 py-2 border">
                                                    {{ $invoice->updated_at->format('jS M, Y') }}
                                                </td>
                                                <td class="px-4 py-2">
                                                    <div
                                                        class="dropdown relative inline-flex rtl:[--placement:bottom-end]">
                                                        <x-buttons.btn aria-expanded="false" aria-haspopup="menu"
                                                            aria-label="Dropdown"
                                                            class="border-none rounded-md dropdown-toggle bg-primary/70 hover:bg-primary/90"
                                                            id="dropdown-default" type="button">
                                                            <svg class="size-6" fill="none" stroke-width="1.5"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>

                                                            <span
                                                                class="size-4 icon-[tabler--chevron-down] dropdown-open:rotate-180">
                                                            </span>
                                                        </x-buttons.btn>
                                                        <ul aria-labelledby="dropdown-default"
                                                            aria-orientation="vertical"
                                                            class="min-w-60 dropdown-menu hidden border-[1px] bg-white !text-black dropdown-open:opacity-100"
                                                            role="menu">
                                                            {{-- //TODO:If status == sent but not paid --}}
                                                            {{-- Dispatch event, send mailable, add function to do so? --}}
                                                            <li><a class="dropdown-item !text-black" href="#">Send
                                                                    Reminder</a></li>

                                                            <li><a class="dropdown-item !text-black"
                                                                    href="{{ route('invoices.edit', $invoice->invoice_number) }}">
                                                                    Edit
                                                                    Invoice</a>
                                                                </li>
                                                            <li><a class="dropdown-item !text-black"
                                                                    href="{{ route('invoices.view', $invoice->invoice_number) }}">Preview
                                                                    Invoice</a></li>
                                                            <li><a class="dropdown-item !text-black"
                                                                    href="#">Print
                                                                    Invoice</a></li>
                                                            <li><a class="dropdown-item !text-black"
                                                                    href="#">Download
                                                                    PDF</a></li>
                                                            <li><a class="dropdown-item !text-black"
                                                                    href="#">Cancel
                                                                    Invoice</a></li>
                                                            <li><a class="my-2 text-white bg-red-600 border-none btn dropdown-item hover:bg-red-800"
                                                                    href="#">Delete Invoice</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
