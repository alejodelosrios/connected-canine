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
                <!-- Vet email -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_email" value="{{ __('Email') }}" />
                    <p>{{ $vet->vet_email }}</p>
                </div>
                <!-- Vet phone number -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_phone_number" value="{{ __('Phone number') }}" />
                    <p>{{ $vet->vet_phone_number }}</p>
                </div>
            </div>
            <div class="row">
                <!-- Vet contact 1 -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_contact1" value="{{ __('Contact 1') }}" />
                    <p>{{ $vet->vet_contact1 }}</p>
                </div>
                <!-- Vet contact 2 -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_contact2" value="{{ __('Contact 2') }}" />
                    <p>{{ $vet->vet_contact2 }}</p>
                </div>
            </div>
            <!-- Vet address -->
            <div class="mb-3">
                <x-jet-label for="vet_address" value="{{ __('Address') }}" />
                <p>{{ $vet->vet_address }}</p>
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
            <!-- Vet website -->
            <div class="mb-3">
                <x-jet-label for="vet_website" value="{{ __('Website') }}" />
                <p>{{ $vet->vet_website }}</p>
            </div>
            @else
                <div class="my-3">
                    <p>There is not a veterinarian assigned to this pet</p>
                </div>
            @endif

        </x-card>
    </x-app-layout>
