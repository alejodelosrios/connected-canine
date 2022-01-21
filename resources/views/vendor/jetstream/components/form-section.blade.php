@props(['submit'])

<div {{ $attributes->merge(['class' => 'row']) }}>
    <div class="col-md-4">
        <x-jet-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">
                <span class="small">
                    {{ $description }}
                </span>
            </x-slot>
        </x-jet-section-title>
    </div>
    <div class="col-md-8">


        @isset($form)
            <div class="card shadow-sm">
                <form wire:submit.prevent="{{ $submit }}">
                    <div class="card-body">
                        {{ $form }}
                    </div>
                </form>
            </div>
        @endisset

        @isset($no_card_body)
            <div>
                <form wire:submit.prevent="{{ $submit }}">
                    <div>
                        {{ $no_card_body }}
                    </div>
                </form>
            </div>
        @endisset

        @if (isset($actions))
            <div class="card-footer d-flex justify-content-end">
                {{ $actions }}
            </div>
        @endif

    </div>
</div>
