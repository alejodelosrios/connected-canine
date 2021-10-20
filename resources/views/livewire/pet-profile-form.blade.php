<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Pet Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your pet\'s profile information.') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        {{-- Profile Photo --}}
        <div class="mb-3" x-data="{photoName: null, photoPreview: null}">
            {{-- Profile Photo File Input --}}
            <input type="file" hidden wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('Photo') }}" />

            {{-- Current Profile Photo  --}}
            <div class="mt-2" x-show="! photoPreview">
                {{-- <img src="{{ $this->pet->profile_photo_url }}" class="rounded-circle" height="80px" width="80px"> --}}
            </div>

            {{-- New Profile Photo Preview --}}
            <div class="mt-2" x-show="photoPreview">
                <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
            </div>

            <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-jet-secondary-button>

            {{-- @if ($this->pet->profile_photo_path)
                <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                    <div wire:loading wire:target="deleteProfilePhoto" class="spinner-border spinner-border-sm"
                        role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    {{ __('Remove Photo') }}
                </x-jet-secondary-button>
            @endif --}}

            <x-jet-input-error for="photo" class="mt-2" />
        </div>

        <div class="row">
            {{-- Name --}}
            <div class="mb-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>

            {{-- Birthday --}}
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="birthday" value="{{ __('Birthday') }}" />
                <x-jet-input id="birthday" type="date" class="{{ $errors->has('birthday') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.birthday" />
                <x-jet-input-error for="birthday" />
            </div>

            {{-- Sex --}}
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="sex" value="{{ __('Sex') }}" />
                <x-jet-input id="sex" class="{{ $errors->has('sex') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.sex" />
                <x-jet-input-error for="sex" />
            </div>

            {{-- Weight --}}
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="weight" value="{{ __('Weight') }}" />
                <x-jet-input id="weight" type="number" class="{{ $errors->has('weight') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.weight" />
                <x-jet-input-error for="weight" />
            </div>

            {{-- Color --}}
            <div class="mb-3 col-12 col-md-6">
                <x-jet-label for="color" value="{{ __('Color') }}" />
                <x-jet-input id="color" class="{{ $errors->has('color') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.color" />
                <x-jet-input-error for="color" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="d-flex align-items-baseline">
            <x-jet-button>
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                {{ __('Save') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>
