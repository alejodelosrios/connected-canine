@props(['background'])
<!-- Navbar -->
<nav {{ $attributes->merge(['class' => 'top-0 my-3  navbar navbar-expand-lg position-absolute z-index-3 mx-2']) }}>

    <div class="container">
        <a class="d-flex navbar-brand me-4 align-items-center" href="/">
<<<<<<< HEAD
            @if ($background  === "light")
=======
            @if ($background ?? '' === "light")
>>>>>>> e3dc05fc02d2c84d28e15565431b67fa84a7e984
                <img src="{{ asset('img/logo-black-green.png') }}" width="140px" height="47px" alt="">
            @else
                <img src="{{ asset('img/logo-white.png') }}" width="140px" height="47px" alt="">
            @endif
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
                @auth
                    <!-- Desktop -->
                    <ul class="navbar-nav align-items-baseline d-none d-md-flex">
                        <!-- Settings Dropdown -->
                        @auth
                            <div class="d-none d-md-block">
                                <x-jet-dropdown id="settingsDropdown">
                                    <x-slot name="trigger">
                                        <img class="rounded-circle" width="32" height="32"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <h6 class="dropdown-header small text-muted">
                                            {{ __('Manage Account') }}
                                        </h6>

                                        <x-jet-dropdown-link href="{{ route('user.profile') }}">
                                            {{ __('Profile') }}
                                        </x-jet-dropdown-link>

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

                        <div class="d-flex">
                            <img class="rounded-circle me-2" width="32" height="32"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            <h6 class="">
                                {{ Auth::user()->name }}
                            </h6>
                        </div>

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

                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                            class="mb-0 btn btn-sm bg-gradient-secondary btn-round me-1">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
