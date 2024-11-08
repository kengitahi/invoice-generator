@php
    // dd($invoices);
@endphp

<x-app-layout>
    <div>
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Your Invoices') }}
            </h2>
        </x-slot>

        @if (session('createdInvoice'))
            <div class="py-4" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition.duration.500ms>
                <p class="mx-auto my-4 max-w-[80%] rounded-md bg-green-600 px-4 py-2 text-lg font-semibold text-white">
                    You have successfully created an invoice</p>
            </div>
        @endif
        
        @if (session('updatedInvoice'))
            <div class="py-4" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition.duration.500ms>
                <p class="mx-auto my-4 max-w-[80%] rounded-md bg-blue-600 px-4 py-2 text-lg font-semibold text-white">
                    You have successfully updated an invoice</p>
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
                            <svg class="transition duration-300 ease-in-out size-4 group-hover:translate-x-2"
                                fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
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
                                                            <li class="">
                                                                <a class="dropdown-item !text-black" href="#">
                                                                    <svg class="size-4" fill="none" stroke-width="2"
                                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                    Send Reminder
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item !text-black" href="#">
                                                                    <svg aria-hidden="true" class="size-4 shrink-0"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        width="20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"
                                                                            stroke-linecap="round" stroke-width="2"
                                                                            stroke="currentColor" />
                                                                    </svg>
                                                                    Resend Invoice
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item !text-black"
                                                                    href="{{ route('invoices.view', $invoice->invoice_number) }}">
                                                                    <svg class="size-4" fill="none" stroke-width="2"
                                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>

                                                                    Preview Invoice
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item !text-black"
                                                                    href="{{ route('invoices.edit', $invoice->invoice_number) }}">
                                                                    <svg class="size-4" fill="none"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                    Edit Invoice
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item !text-black" href="#">
                                                                    <svg class="size-4 shrink-0" fill="none"
                                                                        height="24" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                                        width="24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                                        <polyline points="7 10 12 15 17 10" />
                                                                        <line x1="12" x2="12"
                                                                            y1="15" y2="3" />
                                                                    </svg>
                                                                    Download PDF
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item !text-black" href="#">
                                                                    <svg class="size-4 shrink-0" fill="none"
                                                                        height="24" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                                        width="24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <polyline points="6 9 6 2 18 2 18 9" />
                                                                        <path
                                                                            d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                                                        <rect height="8" width="12" x="6"
                                                                            y="14" />
                                                                    </svg>
                                                                    Print Invoice
                                                                </a>
                                                            </li>

                                                            {{-- Change status to created or not send --}}
                                                            <li>
                                                                <a class="dropdown-item !text-black" href="#">
                                                                    <svg class="size-6" fill="none"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>

                                                                    Cancel Invoice
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a class="my-2 text-white bg-red-600 border-none btn dropdown-item hover:bg-red-800"
                                                                    href="#">
                                                                    <svg class="size-6" fill="none"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>

                                                                    Delete Invoice
                                                                </a>
                                                            </li>
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
