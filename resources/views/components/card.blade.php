<div {{ $attributes->merge(['class' => 'p-4 card z-index-0']) }}>

    @isset($header)
        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
            {{ $header }}
        </div>
    @endisset

    <div class="card-body pt-2">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="mx-3 mt-3 position-relative z-index-1">
            {{ $footer }}
        </div>
    @endisset
</div>
