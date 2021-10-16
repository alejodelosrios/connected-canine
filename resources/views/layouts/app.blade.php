<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('/dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/dashboard/css/soft-ui-dashboard.css') }}" rel="stylesheet" />

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        .navbar .navbar-brand {
            color: black;
        }

    </style>

</head>

<body class="font-sans antialiased bg-light">

    <div class="container top-0 px-2 mx-auto position-sticky z-index-sticky">
        <div class="row">
            <div class="col-12">
                <x-navbar class="py-2 shadow blur blur-rounded start-0 end-0">
                    <x-slot name="buttons">
                        @auth

                        @else
                            <li class="mb-2 nav-item mx-md-2 mb-md-0">
                                <a href="{{ route('login') }}"
                                    class="mb-0 btn btn-sm bg-gradient-primary btn-round me-1">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}"
                                        class="mb-0 btn btn-sm bg-gradient-secondary btn-round me-1">Register</a>
                                </li>
                            @endif
                        @endauth

                    </x-slot>
                </x-navbar>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <main class="container py-5 my-5">
        {{ $slot }}
    </main>

    @stack('modals')

    @livewireScripts

    <!-- Core -->
    <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('dashboard/js/soft-ui-dashboard.min') }}.js"></script>

    @stack('scripts')
</body>

</html>
