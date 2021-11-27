<x-app-layout>
    <x-card>
        <x-pet-details-wrap :pet="$pet" title="Pet Veterinarian" />
        @isset($vet)
            <!-- Vet clinic -->
            <div class="mb-3">
                <x-jet-label for="vet_clinic" value="{{ __('Vet clinic') }}" />
                <p>{{ $vet->vet_clinic }}</p>
            </div>
            <div class="row">
                <!-- Vet address -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_address" value="{{ __('Address') }}" />
                    <p>{{ $vet->vet_address }}</p>
                </div>
                <!-- Vet phone number -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_phone_number" value="{{ __('Phone number') }}" />
                    <p>{{ $vet->vet_phone_number }}</p>
                </div>
            </div>
            <div class="row">
                <!-- Vet city -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_city" value="{{ __('City') }}" />
                    <p>{{ $vet->vet_city }}</p>
                </div>
                <!-- Vet zipcode -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_zip_code" value="{{ __('Zipcode') }}" />
                    <p>{{ $vet->vet_zip_code }}</p>
                </div>
            </div>
        @else
            <div class="my-3">
                <p>There is not a veterinarian assigned to this pet</p>
            </div>
            @endif

        </x-card>
    </x-app-layout>
