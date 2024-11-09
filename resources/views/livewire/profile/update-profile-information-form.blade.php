<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Traits\HasUploadedFile;

new class extends Component {
    use HasUploadedFile, WithFileUploads;

    public string $name = '';
    public string $email = '';
    public string $avatar;
    public $newAvatar = null;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        if (Auth::user()->avatar) {
            $this->avatar = Auth::user()->avatar;
        }
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'newAvatar' => ['nullable', 'image:jpg,jpeg,png', 'max:1024'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($this->newAvatar) {
            $user->avatar = $this->updateFile($this->newAvatar, $user->avatar, 'avatars', 'avatar');
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);

    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
};
?>

<section >
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form class="mt-6 space-y-6" wire:submit="updateProfileInformation">
        <div>
            <x-input-label :value="__('Name')" for="name" />
            <x-text-input autocomplete="name" autofocus class="block w-full mt-1" id="name" name="name" required
                type="text" wire:model="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label :value="__('Email')" for="email" />
            <x-text-input autocomplete="username" class="block w-full mt-1" id="email" name="email" required
                type="email" wire:model="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button
                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            wire:click.prevent="sendVerification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div <!-- Current Avatar -->
        @if (auth()->user()->avatar)
            <div class="mt-4">
                <x-input-label :value="__('Current Profile Picture')" for="avatar" />
                <img alt="Profile Picture" class="block max-h-[200px] rounded-md border-gray-300 shadow-sm"
                    src="{{ Storage::url(auth()->user()->avatar) }}">
            </div>
        @endif

        <div class="mt-4">
            @if (auth()->user()->avatar)
            <x-input-label :value="__('Change Profile Picture')" for="avatar" />
            @else
            <x-input-label :value="__('Add a Profile Picture')" for="avatar" />
            @endif
            <x-text-input class="block w-full mt-1" id="avatar" name="avatar" type="file"
                wire:model="newAvatar" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        @if ($newAvatar)
            <div class="mt-4">
                <p class="block mb-2 text-sm font-medium text-gray-700">
                    {{ __('New Profile Picture') }}
                </p>
                <img class="block max-h-[200px] rounded-md border-gray-300 shadow-sm"
                    src="{{ $newAvatar->temporaryUrl() }}">
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Your have successfully updated your profile.') }}
            </x-action-message>
        </div>
    </form>
</section>
