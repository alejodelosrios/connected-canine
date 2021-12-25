<div>
    <form wire:submit.prevent="updateProfileInformation" role="form text-left">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <div class=" row">
            <!-- Name -->
            <div class="mb-3 col-12 col-md-6 ">
                <x-jet-label for="name" value="{{ __('First name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>

            <!-- Lastname -->
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="lastname" value="{{ __('Last name') }}" />
                <x-jet-input id="lastname" type="text" class="{{ $errors->has('lastname') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.lastname" required/>
                <x-jet-input-error for="lastname" />
            </div>

            <!-- Email -->
            <div class="mb-3 col-12-md">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input :disabled=true id="email" type="email" required
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
                <x-jet-input-error for="email" />
            </div>

            <!-- Phone number -->
            <div class="mb-3 col-12 col-md-4">
                <x-jet-label for="phone_number" value="{{ __('Phone number') }}" />
                <x-jet-input id="phone_number" type="tel" placeholder="(999) 999-9999" min="10" max="10" required
                    class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.phone_number" />

                <script type="text/javascript">
                    document.getElementById('phone_number').addEventListener('input', function(y) {
                        var a = y.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                        y.target.value = !a[2] ? a[1] : '(' + a[1] + ') ' + a[2] + (a[3] ? '-' + a[3] : '');
                    });
                </script>
                <x-jet-input-error for="phone_number" />
            </div>

            <!-- Zip code -->
            <div class="mb-3 col-12 col-md-4">
                <x-jet-label for="zip_code" value="{{ __('Zip code') }}" />
                <x-jet-input id="zip_code" type="zip_code" class="{{ $errors->has('zip_code') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.zip_code" />
                <x-jet-input-error for="zip_code" />
            </div>

            {{-- State --}}
            <div class="mb-3 col-12 col-md-4">
                <x-jet-label for="state" value="{{ __('State/Province/Region') }}" />

                <x-jet-input id="state" type="state" class="{{ $errors->has('state') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.state" />
                <x-jet-input-error for="state" />
            </div>

            <!-- Address -->
            <div class="mb-3 col-12">
                <x-jet-label for="address.home_street" value="{{ __('Address') }}" />
                <x-jet-input id="address.home_street" type="text"
                    class="{{ $errors->has('address.home_street') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.address.home_street" />
                <x-jet-input-error for="address.home_street" />
            </div>
            <div class="mb-3 col-12">
                <x-jet-label for="street_address" value="{{ __('Address 2') }}" />
                <x-jet-input id="street_address" type="street_address"
                    class="{{ $errors->has('address.street_address') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.address.street_address" />
                <x-jet-input-error for="address.street_address" />
            </div>

        </div>

    </form>
</div>
