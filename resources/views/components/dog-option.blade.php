@props([
    'key' => '',
    'image' => ' ',
    'value' => '',
])
<label class="pb-1 h-100 d-flex flex-column justify-content-between align-items-center " for="{{ $key }}"
    style="cursor:pointer">
    <span class="py-1 text-center bg-gray-200 w-100">{{ $value }}</span>
    <img src="{{ asset("img/behaviors/{$image}.png") }}" alt="" class="mx-1 my-2 flex-fill " style="width:100px; height:64px" />
    <input type="checkbox" {{ $attributes->whereStartsWith('wire:') }} {{ $attributes->whereStartsWith('name') }}
        value="{{ $value }}" id="{{ $key }}" class="mx-2">
</label>
