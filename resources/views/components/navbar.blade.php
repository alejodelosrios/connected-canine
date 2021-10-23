<!-- Navbar -->
<nav {{ $attributes->merge(['class' => 'top-0 my-3  navbar navbar-expand-lg position-absolute z-index-3 mx-2']) }}>
    <div class="container">
        <a class="d-flex navbar-brand me-4 align-items-center" href="/">
            <x-jet-application-mark width="36" />
            <span class="mx-2">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <button class="shadow-none navbar-toggler ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="mt-2 navbar-toggler-icon">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="pt-3 pb-2 collapse navbar-collapse w-100 py-lg-0" id="navigation">
            <div class="mx-auto">
                {{ $navlink ?? '' }}
            </div>
            <ul class="navbar-nav d-flex">
                {{ $buttons ?? '' }}
            </ul>
        </div>
    </div>
</nav>
