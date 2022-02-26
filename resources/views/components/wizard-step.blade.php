@props([
"number",
"route",
"title"
])

<a class="d-flex flex-column justify-content-center align-items-center mb-3" href="{{ $route }}">
    <div class="border rounded-circle d-flex justify-content-center align-items-center mb-2"
        style="height:35px; width:35px" :class="checkClass({{ $number }})">{{ $number }}</div>

    <span style="margin-bottom: 0;" :class="checkClass({{ $number }})" class="mx-1 btn btn-sm">
        {{ $title }}
    </span>
</a>
