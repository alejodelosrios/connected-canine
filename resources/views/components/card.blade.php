<div {{ $attributes->merge(['class' => 'card p-3 z-index-0']) }}>

    @isset($header)
        <div class="p-0 mx-3 mt-3 card-header position-relative z-index-1">
            {{ $header }}
        </div>
    @endisset

    <div class="pt-2 card-body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="mx-3 mt-3 position-relative z-index-1">
            {{ $footer }}
        </div>
    @endisset
</div>
