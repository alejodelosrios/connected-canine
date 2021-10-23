<div class="dropdown">
    <a href="#" class="dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
        {{ Auth::user()->name }}
        <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}"
            alt="{{ Auth::user()->name }}" />
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
        <li>
            <a class="dropdown-item" href="#">
                <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/icons/flags/DE.png" /> Deutsch
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/icons/flags/GB.png" />
                English(UK)
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/icons/flags/FR.png" /> Français
            </a>
        </li>
    </ul>
</div>


{{-- <div class="dropdown">





    <ul class="navbar-nav align-items-baseline d-none d-md-flex">
        <!-- Settings Dropdown -->
        @auth
            <a href="#" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                @else
                    {{ Auth::user()->name }}

                    <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                @endif
            </a>

            <div class="d-none d-md-block">
                <x-jet-dropdown id="settingsDropdown">
                    <x-slot name="trigger">

                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->

                    </x-slot>
                </x-jet-dropdown>
            </div>
        @endauth
    </ul>
    <!-- Mobile -->
    <ul class="d-md-none navbar-nav">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="d-flex">
                <img class="rounded-circle me-2" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}"
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



    <!-- Account Management -->
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
        <li>
            <h6 class="dropdown-header small text-muted">
                {{ __('Manage Account') }}
            </h6>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('user.profile') }}">
                {{ __('Profile') }}
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Log out') }}
            </a>
            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                @csrf
            </form>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/icons/flags/FR.png" /> Français
            </a>
        </li>
    </ul>
</div> --}}
