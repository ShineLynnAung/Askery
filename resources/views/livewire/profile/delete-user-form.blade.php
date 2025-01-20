<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use App\Models\Comment;

new class extends Component
{
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        $user = Auth::user();

        if($user){

            $user->comments()->delete();
            $user->posts()->delete();
            $user->stars()->delete();

            tap(Auth::user(), $logout(...))->delete();
        }

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mb-4">
    <header>
        <h2 class="h1 font-md text-white">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-white">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    class="btn btn-danger">{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="mt-3">
        <form wire:submit="deleteUser" class="p-6 mt-4 mb-4 me-5 ms-5">

            <h2 class="h2 font-md text-gray">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 form-control w-80"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="d-flex align-items-center gap-3 mt-3">
                <button class=" btn btn-info" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </button>

                <x-danger-button class="ms-3 btn btn-danger">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
