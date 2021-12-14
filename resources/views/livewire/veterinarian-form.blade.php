<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Veterinarian Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please Identify Your Veterinarian') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>


        <div class="w-100">
            <!-- Search clinic -->
            <x-jet-label for="search_clinic" value="{{ __('Search clinic') }}" />
            <div class="relative mb-4 " autocomplete="off">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" wire:model="search" placeholder="Type here to search...">
                </div>
                @if ($search)
                    <ul class="absolute left-0 w-full mt-1 bg-gray-100 list-group">
                        @foreach ($this->vets as $vet)
                            <li class="list-group-item list-group-item-action"
                                wire:click="vet_data({{ $vet }})">{{ $vet->vet_clinic }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            {{-- @if ($state !== []) --}}
            <!-- Vet clinic -->
            <div class="mb-3">
                <x-jet-label for="vet_clinic" value="{{ __('Vet clinic') }}" />
                <x-jet-input id="vet_clinic" type="text" class="{{ $errors->has('vet_clinic') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.vet_clinic" autocomplete="vet_clinic" />
                <x-jet-input-error for="vet_clinic" />
                {{-- <p>{{ $state['vet_clinic'] }}</p> --}}
            </div>
            <div class="row">
                <!-- Vet address -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_address" value="{{ __('Address') }}" />

                    <x-jet-input id="vet_address" type="text"
                        class="{{ $errors->has('vet_address') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.vet_address" autocomplete="vet_address" />
                    {{-- <p>{{ $state['vet_address'] !== null ? $state['vet_address'] : 'No info available' }}</p> --}}
                </div>
                <!-- Vet phone number -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_phone_number" value="{{ __('Phone number') }}" />

                    <x-jet-input id="vet_phone_number" type="text"
                        class="{{ $errors->has('vet_phone_number') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.vet_phone_number" autocomplete="vet_phone_number" />
                    {{-- <p>{{ $state['vet_phone_number'] !== null ? $state['vet_phone_number'] : 'No info available' }} --}}
                    {{-- </p> --}}
                </div>
            </div>
            <div class="row">
                <!-- Vet city -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_city" value="{{ __('City') }}" />
                    <x-jet-input id="vet_city" type="text"
                        class="{{ $errors->has('vet_city') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.vet_city" autocomplete="vet_city" />
                    {{-- <p>{{ $state['vet_city'] !== null ? $state['vet_city'] : 'No info available' }}</p> --}}
                </div>
                <!-- Vet zipcode -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="vet_zip_code" value="{{ __('Zipcode') }}" />
                    <x-jet-input id="vet_zip_code" type="text"
                        class="{{ $errors->has('vet_zip_code') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.vet_zip_code" autocomplete="vet_zip_code" />
                    {{-- <p>{{ $state['vet_zip_code'] !== null ? $state['vet_zip_code'] : 'No info available' }}</p> --}}
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="d-flex align-items-baseline">
            <x-jet-button type="submit">
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                {{ __('Save') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>
