<aside class="my-3 border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start ms-3 "
    id="sidenav-main">
    {{-- Logo Brand --}}
    <div class="pt-4 sidenav-header">
        {{-- TODO: ADAPT LOGO BRAND FROM JETSTREAM COMPONENT --}}
        <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute end-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="ps-4" href="{{ route('welcome') }}" target="_blank">
            <img src="{{ asset('img/logo-black-green.svg') }}" width="140px" height="47px" alt="">
            {{-- <x-jet-application-mark width="36" /> --}}
            {{-- <span class="ms-1 font-weight-bold">{{ config('app.name') }}</span> --}}
        </a>
    </div>

    <hr class="mt-0 horizontal dark">

    <div class="w-auto collapse navbar-collapse max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            {{-- @role('Admin') --}}
            {{-- <x-dashboard.nav-link route="admin.dashboard" title="Home" :active="request()->is('admin/home')"> --}}
            {{-- <x-slot name="icon"> --}}
            {{-- <x-slot name="icon"> --}}
            {{-- @if (request()->is('admin/home')) --}}
            {{-- <img src="{{ asset('img/home-white.png') }}" width="20px" height="20px" alt=""> --}}
            {{-- @else --}}
            {{-- <img src="{{ asset('img/home.png') }}" width="20px" height="20px" alt=""> --}}
            {{-- @endif --}}
            {{-- </x-slot> --}}
            {{-- </x-dashboard.nav-link> --}}
            {{-- @endrole --}}
            <x-dashboard.nav-link route="bookings.create" title="Reservations"
                :active="request()->is('bookings/*') || request()->is('bookings')">
                <x-slot name="icon">
                    @if (request()->is('bookings/*') || request()->is('bookings'))
                        <img src="{{ asset('img/calendar-white.png') }}" width="20px" height="20px" alt="">
                    @else
                        <img src="{{ asset('img/calendar.png') }}" width="20px" height="20px" alt="">
                    @endif
                </x-slot>
            </x-dashboard.nav-link>

            <x-dashboard.nav-link route="pet.index" title="Pets"
                :active="request()->is('pets/*') || request()->is('pets')">
                <x-slot name="icon">
                    @if (request()->is('pets/*') || request()->is('pets'))
                        <img src="{{ asset('img/pets-white.png') }}" width="20px" height="20px" alt="">
                    @else
                        <img src="{{ asset('img/pets.png') }}" width="20px" height="20px" alt="">
                    @endif
                </x-slot>
            </x-dashboard.nav-link>

            <x-dashboard.nav-link route="user.profile" title="User Profile"
                :active="request()->is('user/*') || request()->is('user')">
                <x-slot name="icon">
                    @if (request()->is('user/*') || request()->is('user'))
                        <img src="{{ asset('img/user-white.png') }}" width="20px" height="20px" alt="">
                    @else
                        <img src="{{ asset('img/user.png') }}" width="20px" height="20px" alt="">
                    @endif
                </x-slot>
            </x-dashboard.nav-link>

            {{-- <x-dashboard.nav-link route="insurance" title="Insurance" :active="request()->is('insurance')">
                <x-slot name="icon">
                    @if (request()->is('insurance'))
                        <img src="{{ asset('img/insurance-white.png') }}" width="20px" height="20px" alt="">
                    @else
                        <img src="{{ asset('img/insurance.png') }}" width="20px" height="20px" alt="">
                    @endif
                </x-slot>
            </x-dashboard.nav-link> --}}

            <x-dashboard.nav-link route="admin.users-index" title="Participants"
                :active="request()->is('admin/users/*') || request()->is('admin/users') || request()->is('admin/pets/*/*')">
                <x-slot name="icon">
                    @if (request()->is('admin/users/*') || request()->is('admin/users') || request()->is('admin/pets/*/*'))
                        <img src="{{ asset('img/users-white.png') }}" width="20px" height="20px" alt="">
                    @else
                        <img src="{{ asset('img/users.png') }}" width="20px" height="20px" alt="">
                    @endif
                </x-slot>
            </x-dashboard.nav-link>

            <x-dashboard.nav-link route="user-message" title="Contact Us" :active="request()->is('messages')">
                <x-slot name="icon">
                    @if (request()->is('messages'))
                        <img src="{{ asset('img/contact-us-white.png') }}" width="20px" height="20px" alt="">
                    @else
                        <img src="{{ asset('img/contact-us.png') }}" width="20px" height="20px" alt="">
                    @endif
                </x-slot>
            </x-dashboard.nav-link>

            <hr class="mt-4 horizontal dark">

            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <div
                        class="text-center bg-white shadow icon-sm icon icon-shape border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24">
                            <path
                                d="M10 9.408l2.963 2.592-2.963 2.592v-1.592h-8v-2h8v-1.592zm-2-4.408v4h-8v6h8v4l8-7-8-7zm6-3c-1.787 0-3.46.474-4.911 1.295l.228.2 1.396 1.221c1.004-.456 2.114-.716 3.287-.716 4.411 0 8 3.589 8 8s-3.589 8-8 8c-1.173 0-2.283-.26-3.288-.715l-1.396 1.221-.228.2c1.452.82 3.125 1.294 4.912 1.294 5.522 0 10-4.477 10-10s-4.478-10-10-10z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Log out</span>
                </a>
            </li>
            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                @csrf
            </form>
        </ul>

    </div>
</aside>
