<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="relative hidden md:flex" x-data="{ dropdownOpen: false }">
    <button @click="dropdownOpen=true"
        class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white border rounded-md text-neutral-700 hover:bg-neutral-100 focus:bg-white focus:outline-none active:bg-white disabled:pointer-events-none disabled:opacity-50">
        <img class="object-cover w-8 h-8 border rounded-full border-neutral-200"
            src="https://cdn.devdojo.com/images/may2023/adam.jpeg" />
        <span class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
            <span>
                {{ auth()->user()->name }}
            </span>
            <span class="text-xs font-light text-neutral-400">
                {{ auth()->user()->email }}
            </span>
        </span>
        <svg class="absolute right-0 w-5 h-5 mr-3" fill="none" stroke-width="1.5" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>

    <div @click.away="dropdownOpen=false" class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak
        x-show="dropdownOpen" x-transition:enter-end="translate-y-0" x-transition:enter-start="-translate-y-2"
        x-transition:enter="ease-out duration-200">
        <div class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
            <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
            <a class="cursor-pointer relative flex select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100 data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                href="{{ route('profile') }}">
                <svg class="w-4 h-4 mr-2" fill="none" height="24" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Profile</span>
                <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘P</span>
            </a>
            <a class="cursor-pointer relative flex select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100 data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                href="{{ route('dashboard') }}">
                <svg class="w-4 h-4 mr-2" fill="none" height="24" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect height="14" rx="2" width="20" x="2" y="5"></rect>
                    <line x1="2" x2="22" y1="10" y2="10"></line>
                </svg>
                <span>Invoices</span><span class="ml-auto text-xs tracking-widest opacity-60">⌘B</span>
            </a>
            <a class="cursor-pointer relative flex select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100 data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                href="#">
                <svg class="w-4 h-4 mr-2" fill="none" height="24" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                    </path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <span>Manage Invoices</span>
                <span class="ml-auto text-xs tracking-widest opacity-60">⌘S</span>
            </a>
            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
            <button class="cursor-pointer focus:text-accent-foreground relative flex select-none items-center rounded px-2 py-1.5 text-sm outline-none transition-colors hover:bg-neutral-100 focus:bg-accent data-[disabled]:pointer-events-none data-[disabled]:opacity-50" wire:click="logout">
                <svg class="w-4 h-4 mr-2" fill="none" height="24" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" x2="9" y1="12" y2="12"></line>
                </svg>
                <span>Log out</span>
            </button>            
        </div>
    </div>
</div>
