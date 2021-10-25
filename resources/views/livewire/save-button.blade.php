<div class="d-flex align-items-baseline justify-content-end">
    <x-jet-button wire:click="$emit('save')">
        <div wire:loading class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        {{ __('Save') }}
    </x-jet-button>
</div>
