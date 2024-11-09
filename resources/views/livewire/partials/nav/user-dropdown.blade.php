<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class='dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]'>
    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="flex items-center dropdown-toggle"
        id="dropdown-scrollable" type="button">
        <div class="avatar">
            <div class="size-9.5 rounded-full">
                <img alt="avatar 1" src="{{Storage::url(auth()->user()->avatar)}}" />
            </div>
        </div>
    </button>
    <ul aria-labelledby="dropdown-avatar" aria-orientation="vertical"
        class="hidden bg-black min-w-60 dropdown-menu backdrop-blur-lg dropdown-open:opacity-95">
        <li class="gap-2 dropdown-header">
            <div class="avatar">
                <div class="w-10 rounded-full">
                    <img alt="avatar" src="{{Storage::url(auth()->user()->avatar)}}" />
                </div>
            </div>
            <div>
                <h6 class="text-base font-semibold text-base-content/90">{{ auth()->user()->name }}</h6>
                <small class="text-base-content/50">{{ auth()->user()->email }}</small>
            </div>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('profile')}}">
                <span class="icon-[tabler--user]"></span>
                My Profile
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('dashboard')}}">
                <span class="icon-[tabler--settings]"></span>
                Dashboard
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('invoices.index')}}">
                <span class="icon-[tabler--receipt-rupee]"></span>
                My Invoices
            </a>
        </li>
        <li class="gap-2 dropdown-footer">
            <button class="btn btn-error btn-soft btn-block" wire:click="logout">
                <span class="icon-[tabler--logout]"></span>
                Sign out
            </button>
        </li>
    </ul>
</div>
