<div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="mx-auto col-xl-4 col-lg-5 col-md-7">
            <div class="card z-index-0">
                <div class="pt-4 text-center card-header">
                    <h5>{{ $title ?? ""}}</h5>
                </div>

                <x-social-auth></x-social-auth>

                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
