@props([
    'vaccine' => '',
])
<div class="px-lg-4" x-data="{active:false}">
    <div class="mb-4">
        <label class="d-flex flex-column" for="vaccine_{{ $vaccine }}" style="cursor:pointer">
            <span class="p-4 mb-2 text-center border">{{ $slot }}</span>
            <input type="checkbox" wire:model="state.has_{{ $vaccine }}" id="vaccine_{{ $vaccine }}"
                class="mx-2" >
        </label>
    </div>

    <div>
        <label class="d-flex flex-column" for="{{ $vaccine }}_vaccine_expiration" style="cursor:pointer">
            <span class="text-center ">Expiration date</span>
            <x-jet-input id="{{ $vaccine }}_vaccine_expiration" type="date" 
                class="{{ $errors->has('state.' . $vaccine) ? 'is-invalid' : '' }}"
                wire:model="state.{{ $vaccine }}" />
            <x-jet-input-error for="{{ $vaccine }}" />
        </label>
    </div>
</div>
