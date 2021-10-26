<x-app-layout>
    <div class="p-4">
        <x-card>
            @livewire('pet-profile-form')

            <x-slot name="footer">
                <div class="d-flex align-items-baseline justify-content-end">
                    <div>
                        <a href="{{ route('pet.index') }}" class="btn btn-secondary mx-2">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                    @livewire('save-button')
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
