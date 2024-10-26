<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" class="mb-4" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label :value="__('Email')" for="email" />
            <x-text-input autocomplete="username" autofocus class="mt-1 block w-full" id="email" name="email" required
                type="email" wire:model="form.email" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label :value="__('Password')" for="password" />

            <x-text-input autocomplete="current-password" class="mt-1 block w-full" id="password" name="password"
                required type="password" wire:model="form.password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 block">
            <label class="inline-flex items-center" for="remember">
                <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" id="remember"
                    name="remember" type="checkbox" wire:model="form.remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button class="group ms-3 gap-2 transition duration-300 ease-in-out">
                {{ __('Log in') }}
                <span
                    class="icon-[tabler--login] transition duration-300 ease-in-out group-hover:-translate-x-2"></span>

            </x-primary-button>
        </div>

        <hr class="mt-4 h-1 border-gray-200 bg-gray-200">

        <div class="flex justify-between max-[400px]:flex-col">
            <div class="mt-4 flex flex-col items-center text-center">
                <p class="rounded-md text-sm text-gray-600 mb-1 font-semibold">
                    {{ __('Forgot Your Password?') }}
                </p>

                <x-links.link
                    class="group bg-accent text-xs font-semibold uppercase hover:text-gray-600 hover:bg-accent/70 hover:shadow-md"
                    href="{{ route('password.request') }}" type="secondary">
                    {{ __('Reset Password') }}
                    <svg class="size-6 transition duration-300 ease-in-out group-hover:translate-x-2" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </x-links.link>
            </div>

            <div class="mt-4 flex flex-col items-center">
                <p class="rounded-md text-sm text-gray-600 mb-1 font-semibold">
                    {{ __("Don't have an account?") }}
                </p>

                <x-links.link class="group text-xs font-semibold uppercase hover:shadow-md" href="{{ route('register') }}"
                    type="primary">
                    {{ __('Create An Account') }}
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
