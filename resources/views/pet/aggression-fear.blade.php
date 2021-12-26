<x-behavior-layout title="Aggression and Fear" :pet="$pet">

    @livewire('aggression-fear-form', ['pet'=> $pet])

    <x-slot name="footer">
        <div class="d-flex align-items-baseline justify-content-end">
            <div>
                <a href="{{ route('pet.behavior.separation-confinement', $pet) }}" class="mx-2 btn btn-secondary">
                    {{ __('Cancel') }}
                </a>
            </div>
            @livewire('save-button', [
            'redirect_route_name' => route('pet.update', $pet)
            ])
        </div>
    </x-slot>

</x-behavior-layout>
