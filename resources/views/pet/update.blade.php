<x-app-layout>
        <x-card>
            <x-pet-details-wrap :pet="$pet" />
            @livewire('pet-profile-form',['pet'=> $pet])

            <x-slot name="footer">
                <div class="d-flex align-items-baseline justify-content-end">
                    <div>
                        <a href="{{ route('pet.index') }}" class="btn btn-secondary mx-2">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                    @livewire('save-button', [
                    'redirect_route_name' => 'pets'
                    ])
                </div>
            </x-slot>
        </x-card>
</x-app-layout>
