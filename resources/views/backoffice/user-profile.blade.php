<x-app-layout>
    <div class="p-4">
        <x-card>
            @livewire('profile.update-profile-information-form')
            <x-slot name="footer">
                <div class="d-flex align-items-baseline justify-content-end">
                    @livewire('save-button')
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
