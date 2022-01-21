<div>
    <div class="d-flex justify-content-between  w-100">
        <h4>Accounts</h4>
    </div>

    <form>
        <div class="row">
            {{-- Name --}}
            <div class="mb-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>
            {{-- Domains --}}
            <div class="mb-3">
                <x-jet-label for="domain" value="{{ __('Domain') }}" />
                <x-jet-input id="domain" type="text" class="{{ $errors->has('domain') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.domain" autocomplete="domain" />
                <x-jet-input-error for="domain" />
            </div>
        </div>

        <div class="">
            <x-jet-secondary-button class="mt-2 me-2" type="button" wire:click="cancel">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-button class="mt-2 me-2" type="button" wire:click="save" >
                {{ __('Save') }}
            </x-jet-button>
        </div>
    </form>

</div>
