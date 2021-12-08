<x-behavior-layout title="Separation Confinement" :pet="$pet">
        @livewire('separation-confinement-form', ['pet'=> $pet])

        <x-slot name="footer">
            <div class="d-flex align-items-baseline justify-content-end">
                <div>
                    <a href="{{ route('pet.update', $pet) }}" class="mx-2 btn btn-secondary">
                        {{ __('Cancel') }}
                    </a>
                </div>
                @livewire('save-button', [
                    'redirect_route_name' => route('pet.behavior.separation-confinement', $pet)
                ])
            </div>
        </x-slot>
</x-behavior-layout >
