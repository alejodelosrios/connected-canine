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

    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        .navbar .navbar-brand {
            color: white;
        }

        [x-cloak] {
            display: none !important;
        }

    </style>
</head>

<body class="bg-gray-100 g-sidenav-show">

    @yield('navbar')
    @sectionMissing('navbar')
        <div class="container top-0 px-2 mx-auto position-sticky z-index-sticky">
            <div class="row">
                <div class="col-12">
                    <x-navbar class="py-2 shadow blur blur-rounded start-0 end-0">
                        <x-slot name="buttons">
                            @auth
                                <!-- Right Side Of Navbar -->
                                <!-- Desktop -->
                                <ul class="navbar-nav align-items-baseline d-none d-md-flex">
                                    <!-- Teams Dropdown -->
                                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                        <x-jet-dropdown id="teamManagementDropdown">
                                            <x-slot name="trigger">
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </x-slot>

                                            <x-slot name="content">
                                                <!-- Team Management -->
                                                <h6 class="dropdown-header">
                                                    {{ __('Manage Team') }}
                                                </h6>

                                                <!-- Team Settings -->
                                                <x-jet-dropdown-link
                                                    href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                    {{ __('Team Settings') }}
                                                </x-jet-dropdown-link>

                                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                        {{ __('Create New Team') }}
                                                    </x-jet-dropdown-link>
                                                @endcan

                                                <hr class="dropdown-divider">

                                                <!-- Team Switcher -->
                                                <h6 class="dropdown-header">
                                                    {{ __('Switch Teams') }}
                                                </h6>

                                                @foreach (Auth::user()->allTeams() as $team)
                                                    <x-jet-switchable-team :team="$team" />
                                                @endforeach
                                            </x-slot>
                                        </x-jet-dropdown>
                                    @endif

                                    <!-- Settings Dropdown -->
                                    @auth
                                        <div class="d-none d-md-block">
                                            <x-jet-dropdown id="settingsDropdown">
                                                <x-slot name="trigger">
                                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                        <img class="rounded-circle" width="32" height="32"
                                                            src="{{ Auth::user()->profile_photo_url }}"
                                                            alt="{{ Auth::user()->name }}" />
                                                    @else
                                                        {{ Auth::user()->name }}

                                                        <svg class="ms-2" width="18"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                </x-slot>

                                                <x-slot name="content">
                                                    <!-- Account Management -->
                                                    <h6 class="dropdown-header small text-muted">
                                                        {{ __('Manage Account') }}
                                                    </h6>

                                                    <x-jet-dropdown-link href="{{ route('user.profile') }}">
                                                        {{ __('Profile') }}
                                                    </x-jet-dropdown-link>

                                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                            {{ __('API Tokens') }}
                                                        </x-jet-dropdown-link>
                                                    @endif

                                                    <hr class="dropdown-divider">

                                                    <!-- Authentication -->
                                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                                                                                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Log out') }}
                                                    </x-jet-dropdown-link>
                                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                        @csrf
                                                    </form>
                                                </x-slot>
                                            </x-jet-dropdown>
                                        </div>
                                    @endauth
                                </ul>
                                <!-- Mobile -->
                                <ul class="d-md-none navbar-nav">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <div class="d-flex">
                                            <img class="rounded-circle me-2" width="32" height="32"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}" />
                                            <h6 class="">
                                                {{ Auth::user()->name }}
                                            </h6>
                                        </div>
                                    @else
                                        <h6 class="">
                                            {{ Auth::user()->name }}
                                        </h6>
                                    @endif
                                    <!-- Account Management -->
                                    <li>
                                        <h6 class="dropdown-header small text-muted">
                                            {{ __('Manage Account') }}
                                        </h6>
                                    </li>

                                    <li>
                                        <x-jet-dropdown-link href="{{ route('user.profile') }}">
                                            {{ __('Profile') }}
                                        </x-jet-dropdown-link>
                                    </li>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <li>
                                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                {{ __('API Tokens') }}
                                            </x-jet-dropdown-link>
                                        </li>
                                    @endif

                                    <hr class="dropdown-divider">

                                    <!-- Authentication -->
                                    <li>
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Log out') }}
                                        </x-jet-dropdown-link>
                                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
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
    @endif



    {{ $slot }}


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
