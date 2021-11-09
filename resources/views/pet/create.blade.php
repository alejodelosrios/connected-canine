<x-app-layout>
    <div class="p-4">
        <x-card>
            @livewire('pet-profile-form')

            <x-slot name="footer">
                <div class="d-flex align-items-baseline justify-content-end">
                    <div>
                        <a href="{{ route('pet.index') }}" class="mx-2 btn btn-secondary">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                    @livewire('save-button', [
                    'redirect_route_name' => route('pet.index')
                    ])
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
