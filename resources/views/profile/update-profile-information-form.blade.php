<div>
    <form wire:submit.prevent="updateProfileInformation" role="form text-left">
        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="mb-3" x-data="{photoName: null, photoPreview: null}">
                <!-- Profile Photo File Input -->
                <input type="file" hidden wire:model="photo" x-ref="photo" x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
                </div>

                <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        <div wire:loading wire:target="deleteProfilePhoto" class="spinner-border spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <div class=" row">
            <!-- Name -->
            <div class="mb-3 col-12 col-md-6 ">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>

            <!-- Lastname -->
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
                <x-jet-input id="lastname" type="text" class="{{ $errors->has('lastname') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.lastname" />
                <x-jet-input-error for="lastname" />
            </div>

            <!-- Email -->
            <div class="mb-3 col-12-md">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.email" />
                <x-jet-input-error for="email" />
            </div>

            <!-- Area code -->
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="area_code" value="{{ __('Area code') }}" />
                <x-jet-input id="area_code" type="text" pattern="[0-9]{2,3}"
                    class="{{ $errors->has('area_code') ? 'is-invalid' : '' }}" wire:model.defer="state.area_code" />
                <x-jet-input-error for="area_code" />
            </div>

            <!-- Phone number -->
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="phone_number" value="{{ __('Phone number') }}" />
                <x-jet-input id="phone_number" type="tel"
                    class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.phone_number" />
                <x-jet-input-error for="phone_number" />
            </div>

            <!-- Zip code -->
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="zip_code" value="{{ __('Zip code') }}" />
                <x-jet-input id="zip_code" type="zip_code" class="{{ $errors->has('zip_code') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.zip_code" />
                <x-jet-input-error for="zip_code" />
            </div>

            <!-- Address -->

            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="address.home_street" value="{{ __('Home street') }}" />
                <x-jet-input id="address.home_street" type="text"
                    class="{{ $errors->has('address.home_street') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.address.home_street" />
                <x-jet-input-error for="address.home_street" />
            </div>
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="street_address" value="{{ __('Street address') }}" />
                <x-jet-input id="street_address" type="street_address"
                    class="{{ $errors->has('street_address') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.address.street_address" />
                <x-jet-input-error for="street_address" />
            </div>
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="home_street_2" value="{{ __('Home street  2') }}" />
                <x-jet-input id="home_street_2" type="text"
                    class="{{ $errors->has('home_street_2') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.address.home_street_2" />
                <x-jet-input-error for="home_street_2" />
            </div>
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="street_address_2" value="{{ __('Street address 2') }}" />
                <x-jet-input id="street_address_2" type="street_address_2"
                    class="{{ $errors->has('street_address_2') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.address.street_address_2" />
                <x-jet-input-error for="street_address_2" />
            </div>

        </div>

    </form>
</div>
