<x-app-layout>
    <x-card>
        @livewire('boarding-history-form',['pet' => $pet])

        <x-slot name="footer">
            <div class="d-flex align-items-baseline justify-content-end">
                <div>
                    <a href="{{ route('pet.details', $pet) }}" class="btn btn-secondary mx-2">
                        {{ __('Cancel') }}
                    </a>
                </div>
                @livewire('save-button', [
                'redirect_route_name' => route('pet.details', $pet)
                ])
            </div>
        </x-slot>
    </x-card>
</x-app-layout>
