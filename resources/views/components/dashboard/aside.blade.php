<aside class="my-3 border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start ms-3 "
    id="sidenav-main">
    {{-- Logo Brand --}}
    <div class="pt-4 sidenav-header">
        {{-- TODO: ADAPT LOGO BRAND FROM JETSTREAM COMPONENT --}}
        <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute end-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="ps-4" href="{{ route('home') }}" target="_blank">
            <img src="{{ asset('img/logo-black-green.png') }}" width="140px" height="47px" alt="">
            {{-- <x-jet-application-mark width="36" /> --}}
            {{-- <span class="ms-1 font-weight-bold">{{ config('app.name') }}</span> --}}
        </a>
    </div>

    <hr class="mt-0 horizontal dark">

    <div class="w-auto collapse navbar-collapse max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <x-dashboard.nav-link route="welcome" title="Dashboard" :active="request()->is('welcome')">
                <x-slot name="icon">
                    <svg width="24px" height="24px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>settings</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(304.000000, 151.000000)">
                                        <polygon class="color-background opacity-6"
                                            points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                        </polygon>
                                        <path class="color-background opacity-6"
                                            d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </x-slot>
            </x-dashboard.nav-link>

            <x-dashboard.nav-link route="user.profile" title="User Profile"
                :active="request()->is('user/*') || request()->is('user')">
                <x-slot name="icon">
                    {{--@dump(request()->routeIs("user.profile"))--}}
                    @if (request()->is('user/*') || request()->is('user'))
                        <img src="{{ asset('img/user-white.png') }}" width="20px" height="20px" alt="">
                    @else
                        <img src="{{ asset('img/user.png') }}" width="20px" height="20px" alt="">
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

            <x-dashboard.nav-link route="insurance" title="Insurance" :active="request()->is('insurance')">
                {{-- //TODO: MAKE INSURANCE SCREEN --}}
                <x-slot name="icon">
                    @if (request()->is('insurance'))
                    <img src="{{ asset('img/insurance-white.png') }}" width="20px" height="20px" alt="">
                    @else
                    <img src="{{ asset('img/insurance.png') }}" width="20px" height="20px" alt="">
                    @endif
                </x-slot>
            </x-dashboard.nav-link>

            <x-dashboard.nav-link route="emergency-contact" title="Emergency Contact"
                :active="request()->is('emergency-contact')">
                {{-- //TODO: MAKE EMERGENCY-CONTACT SCREEN --}}
                <x-slot name="icon">
                    @if (request()->is('emergency-contact'))
                    <img src="{{ asset('img/emergency-contact-white.png') }}" width="20px" height="20px" alt="">
                    @else
                    <img src="{{ asset('img/emergency-contact.png') }}" width="20px" height="20px" alt="">
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
