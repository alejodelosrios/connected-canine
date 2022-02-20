<div>

    <a href="{{ $redirectBack }}" class="mx-2 btn btn-secondary">
        {{ __('Back') }}
    </a>

    <x-jet-button wire:click="$emit('save')">
        <div wire:loading class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        {{ __('Next') }}
    </x-jet-button>
</div>
