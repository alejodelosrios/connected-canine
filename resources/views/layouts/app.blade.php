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

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>


<body class="bg-gray-100 g-sidenav-show">

    <x-dashboard.aside />

    <main class="mt-1 main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-dashboard.navbar />

        <div class="container py-4">

            {{ $slot }}

            <x-dashboard.footer />

        </div>
    </main>

    <!-- Page Content -->


    @stack('modals')

    @livewireScripts


    <!-- Theme JS -->
    <script src="{{ asset('dashboard/js/soft-ui-dashboard.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
