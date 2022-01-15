@props([
    'key' => '',
    'value' => '',
])

{{-- -desktop --}}
<div class="row mb-2 d-none d-md-flex">
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

{{-- mobile --}}
<div class="mb-2 d-md-none">

    <p class="text-sm">
        {{ $slot }}
    </p>

    <div class="row {{ $errors->has($key) ? 'is-invalid border-danger' : '' }}">
        {{-- Very relaxed --}}
        <label class="text-center col-12 d-flex align-items-center justify-content-between border p-2 rounded"
            for="{{ $key }}_option1">
            <div>
                <img src="{{ asset('img/behaviors/whines.png') }}"
                    style="width:auto; height:28px; max-width:100%;" />
                <span>Very relaxed</span>
            </div>
            <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Very relaxed"
                id="{{ $key }}_option1" class="mx-2">
        </label>

        {{-- Somewhat relaxed --}}
        <label class="text-center col-12  d-flex align-items-center justify-content-between border p-2 rounded"
            for="{{ $key }}_option2">
            <div>
                <img src="{{ asset('img/behaviors/somewhat-relaxed.png') }}"
                    style="width:auto; height:28px; max-width:100%;" />
                <span>Somewhat relaxed</span>
            </div>
            <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Somewhat relaxed"
                id="{{ $key }}_option2" class="mx-2">
        </label>

        {{-- Neutral --}}
        <label class="text-center col-12  d-flex align-items-center justify-content-between border p-2 rounded"
            for="{{ $key }}_option3">
            <div>
                <img src="{{ asset('img/behaviors/neutral.png') }}"
                    style="width:auto; height:28px; max-width:100%;" />
                <span>Neutral</span>
            </div>
            <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Neutral"
                id="{{ $key }}_option3" class="mx-2">
        </label>

        {{-- Somewhat stressed --}}
        <label class="text-center col-12  d-flex align-items-center justify-content-between border p-2 rounded"
            for="{{ $key }}_option4">
            <div>
                <img src="{{ asset('img/behaviors/somewhat-stressed.png') }}"
                    style="width:auto; height:28px; max-width:100%;" />
                <span>Somewhat stressed</span>
            </div>
            <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Somewhat stressed"
                id="{{ $key }}_option4" class="mx-2">
        </label>

        {{-- Very stressed --}}
        <label class="text-center col-12  d-flex align-items-center justify-content-between border p-2 rounded"
            for="{{ $key }}_option5">
            <div>
                <img src="{{ asset('img/behaviors/lunges.png') }}"
                    style="width:auto; height:28px; max-width:100%;" />
                <span>Very stressed</span>
            </div>
            <input type="radio" {{ $attributes->whereStartsWith('wire:') }} value="Very stressed"
                id="{{ $key }}_option5" class="mx-2">
        </label>
    </div>

</div>


<x-jet-input-error for="{{ $key }}" />
