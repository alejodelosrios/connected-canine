@props([
    'img' => '',
])
<div class="pt-5 m-3 page-header align-items-start min-vh-50 pb-11 border-radius-lg"
    style="background-image: url({{ asset($img) }});">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="mx-auto text-center col-lg-5">
                <h1 class="mt-5 mb-2 text-white">{{ $title ?? "" }}</h1>
                <p class="text-white text-lead">
                    {{ $subtitle ?? "" }}
                </p>
            </div>
        </div>
    </div>
</div>
