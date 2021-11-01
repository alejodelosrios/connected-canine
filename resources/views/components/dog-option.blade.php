@props([
    'key' => '',
    'image' => ' ',
    'value' => '',
])
<label class="pb-1 border h-100 d-flex flex-column justify-content-between align-items-center "
    for="{{ $key }}">
    <span class="py-1 text-center bg-gray-200 w-100">{{ $value }}</span>
    <img src="{{ $image }}" alt="" class="m-1 flex-fill " style="width:70px; height:70px" />
    <input type="checkbox" {{ $attributes->whereStartsWith('wire:') }} {{ $attributes->whereStartsWith('name') }} value="{{ $value }}"
        id="{{ $key }}" class="mx-2">
</label>
