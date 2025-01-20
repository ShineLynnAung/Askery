<x-app-layout class="container" style="background: #0D1B2A;">
    {{-- <x-slot name="header">
        <h2 class="font-lg text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="">
            <div class="p-4">
                <div class="w-75">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <hr style="border: 2.5px solid white;">
            <div class="p-4 ">
                <div class="w-75">
                    <livewire:profile.update-password-form />
                </div>
            </div>
            <hr style="border: 2.5px solid white;">

            <div class="p-4">
                <div class="w-75">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>