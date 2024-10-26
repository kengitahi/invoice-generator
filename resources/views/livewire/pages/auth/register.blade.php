<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label :value="__('Name')" for="name" />
            <x-text-input autocomplete="name" autofocus class="mt-1 block w-full" id="name" name="name" required
                type="text" wire:model="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label :value="__('Email')" for="email" />
            <x-text-input autocomplete="username" class="mt-1 block w-full" id="email" name="email" required
                type="email" wire:model="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label :value="__('Password')" for="password" />

            <x-text-input autocomplete="new-password" class="mt-1 block w-full" id="password" name="password" required
                type="password" wire:model="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label :value="__('Confirm Password')" for="password_confirmation" />

            <x-text-input autocomplete="new-password" class="mt-1 block w-full" id="password_confirmation"
                name="password_confirmation" required type="password" wire:model="password_confirmation" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-center">
            <x-primary-button class="group ms-4 gap-2">
                {{ __('Register') }}
                <svg class="size-6 transition duration-300 ease-in-out group-hover:-translate-x-1" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </x-primary-button>
        </div>

        <hr class="mt-4 h-1 border-gray-200 bg-gray-200">

        <div class="flex justify-center max-[400px]:flex-col">
            <div class="mt-4 flex flex-col items-center">
                <p class="mb-1 rounded-md text-sm font-semibold text-gray-600">
                    {{ __('Already have an account?') }}
                </p>

                <x-links.link class="group text-xs font-semibold uppercase hover:shadow-md gap-2" href="{{ route('login') }}"
                    type="primary">
                    {{ __('Log In') }}
                    <svg class="size-6 transition duration-300 ease-in-out group-hover:translate-x-2" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </x-links.link>
            </div>
        </div>
    </form>
</div>
