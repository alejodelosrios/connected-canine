@props([
    'key' => '',
    'value' => '',
])

<div class="row mb-2">
    <div class="col-4">
        <p class="text-sm text-end">
            {{ $slot }}
        </p>
    </div>
    <div class="col-8">
        <div class="row {{ $errors->has($key) ? 'is-invalid border-danger' : '' }}">

            <label class="text-center col" for="{{ $key }}_option1">
                <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Very relaxed"
                    id="{{ $key }}_option1" class="mx-2">
            </label>

            <label class="text-center col" for="{{ $key }}_option2">
                <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Somewhat relaxed"
                    id="{{ $key }}_option2" class="mx-2">
            </label>

            <label class="text-center col" for="{{ $key }}_option3">
                <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Neutral"
                    id="{{ $key }}_option3" class="mx-2">
            </label>

            <label class="text-center col" for="{{ $key }}_option4">
                <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Somewhat stressed"
                    id="{{ $key }}_option4" class="mx-2">
            </label>

            <label class="text-center col" for="{{ $key }}_option5">
                <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Very stressed"
                    id="{{ $key }}_option5" class="mx-2">
            </label>
        </div>
    </div>
</div>


<x-jet-input-error for="{{ $key }}" />
