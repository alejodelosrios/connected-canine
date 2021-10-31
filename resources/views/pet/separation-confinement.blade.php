<x-app-layout>
    <x-card>
        @livewire('separation-confinement-form', ['pet'=> $pet])

        <x-slot name="footer">
            <div class="d-flex align-items-baseline justify-content-end">
                <div>
                    <a href="{{ route('pet.details', $pet) }}" class="mx-2 btn btn-secondary">
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
