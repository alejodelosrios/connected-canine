@props([
    'key' => '',
    'value' => '',
])
<h6 class="mt-2 text-sm">{{ $slot }}</h6>

<div class="d-flex flex-column {{ $errors->has($key) ? 'is-invalid border-danger' : '' }}">

    <label class="mx-2" for="{{ $key }}_option1">
        <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Very relaxed"
            id="{{ $key }}_option1" class="mx-2"><span>Very relaxed</span>
    </label>

    <label class="mx-2" for="{{ $key }}_option2">
        <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Somewhat relaxed"
            id="{{ $key }}_option2" class="mx-2"><span>Somewhat relaxed</span>
    </label>

    <label class="mx-2" for="{{ $key }}_option3">
        <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Neutral"
            id="{{ $key }}_option3" class="mx-2"><span>Neutral</span>
    </label>

    <label class="mx-2" for="{{ $key }}_option4">
        <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Somewhat stressed"
            id="{{ $key }}_option4" class="mx-2"><span>Somewhat stressed</span>
    </label>

    <label class="mx-2" for="{{ $key }}_option5">
        <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Very stressed"
            id="{{ $key }}_option5" class="mx-2"><span>Very stressed</span>
    </label>
</div>
<x-jet-input-error for="{{ $key }}" />
