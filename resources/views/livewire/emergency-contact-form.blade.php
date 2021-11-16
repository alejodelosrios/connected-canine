<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Emergency Contact') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please fill info about your emergency contact.  This is going to be useful for administrators when necessary.') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>


        <div class="w-100">

            @if (!isset($state['name']))
                <p class="mb-3">There's no emergency contact set yet</p>
            @endif
            <!-- Emergency contact name -->
            <div class="mb-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>
            <!-- Emergency contact lastname -->
            <div class="mb-3">
                <x-jet-label for="lastname" value="{{ __('Last Name') }}" />
                <x-jet-input id="lastname" type="text" class="{{ $errors->has('lastname') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.lastname" autocomplete="lastname" />
                <x-jet-input-error for="lastname" />
            </div>
            <div class="row">
                <!-- Emergency email -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="text" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.email" autocomplete="email" />
                    <x-jet-input-error for="email" />
                </div>
                <!-- Emergency phone -->
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="phone" value="{{ __('Phone number') }}" />
                    <x-jet-input id="phone" type="text" class="{{ $errors->has('phone') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.phone" autocomplete="phone" />
                    <x-jet-input-error for="phone" />
                </div>
            </div>
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
