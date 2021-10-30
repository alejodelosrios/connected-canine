 <nav class="px-0 mx-4 shadow-none navbar navbar-main navbar-expand-lg border-radius-xl" id="navbarBlur"
     navbar-scroll="true">
     <div class="px-3 py-1 container-fluid">
         <nav aria-label="breadcrumb">
             <ol class="px-0 pt-1 pb-0 mb-0 bg-transparent breadcrumb me-sm-6 me-5">
                 <li class="text-sm breadcrumb-item"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                 <li class="text-sm breadcrumb-item text-dark active" aria-current="page">Dashboard</li>
             </ol>
             <h6 class="mb-0 font-weight-bolder">Dashboard</h6>
         </nav>
         <div class="mt-2 collapse navbar-collapse mt-sm-0 me-md-0 me-sm-4" id="navbar">
             <div class="w-75 ms-md-auto pe-md-3 d-flex align-items-center">
                 <div class="input-group">
                     <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                     <input type="text" class="form-control" placeholder="Type here...">
                 </div>
             </div>

             <div class="pt-3 pb-2 collapse navbar-collapse w-100 py-lg-0" id="navigation">
                 <div class="w-100 text-end">
                     <ul class="navbar-nav justify-content-end">
                         <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                             <a href="javascript:;" class="p-0 nav-link text-body" id="iconNavbarSidenav">
                                 <div class="sidenav-toggler-inner">
                                     <i class="sidenav-toggler-line"></i>
                                     <i class="sidenav-toggler-line"></i>
                                     <i class="sidenav-toggler-line"></i>
                                 </div>
                             </a>
                         </li>
                         <li class="px-3 nav-item d-flex align-items-center">
                             <a href="javascript:;" class="p-0 nav-link text-body">
                                 <i class="cursor-pointer fa fa-cog fixed-plugin-button-nav"></i>
                             </a>
                         </li>
                         <li class="nav-item dropdown pe-2 d-flex align-items-center">
                             <a href="javascript:;" class="p-0 nav-link text-body" id="dropdownMenuButton"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="cursor-pointer fa fa-bell"></i>
                             </a>
                             <ul class="px-2 py-3 dropdown-menu dropdown-menu-end me-sm-n4"
                                 aria-labelledby="dropdownMenuButton">
                                 <li class="mb-2">
                                     <a class="dropdown-item border-radius-md" href="javascript:;">
                                         <div class="py-1 d-flex">
                                             <div class="my-auto">
                                                 <img src="{{ asset("dashboard/img/team-2.jpg") }}" class="avatar avatar-sm me-3 ">
                                             </div>
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="mb-1 text-sm font-weight-normal">
                                                     <span class="font-weight-bold">New message</span> from Laur
                                                 </h6>
                                                 <p class="mb-0 text-xs text-secondary">
                                                     <i class="fa fa-clock me-1"></i>
                                                     13 minutes ago
                                                 </p>
                                             </div>
                                         </div>
                                     </a>
                                 </li>
                                 <li class="mb-2">
                                     <a class="dropdown-item border-radius-md" href="javascript:;">
                                         <div class="py-1 d-flex">
                                             <div class="my-auto avatar avatar-sm bg-gradient-secondary me-3">
                                                 <i class="far fa-envelope"></i>
                                             </div>
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="mb-1 text-sm font-weight-normal">
                                                     <span class="font-weight-bold">New album</span> by Travis Scott
                                                 </h6>
                                                 <p class="mb-0 text-xs text-secondary">
                                                     <i class="fa fa-clock me-1"></i>
                                                     1 day
                                                 </p>
                                             </div>
                                         </div>
                                     </a>
                                 </li>
                                 <li>
                                     <a class="dropdown-item border-radius-md" href="javascript:;">
                                         <div class="py-1 d-flex">
                                             <div class="my-auto avatar avatar-sm bg-gradient-secondary me-3">
                                                 <i class="far fa-envelope"></i>
                                             </div>
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="mb-1 text-sm font-weight-normal">
                                                     Payment successfully completed
                                                 </h6>
                                                 <p class="mb-0 text-xs text-secondary">
                                                     <i class="fa fa-clock me-1"></i>
                                                     2 days
                                                 </p>
                                             </div>
                                         </div>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                     </ul>
                 </div>
                 <ul class="navbar-nav d-flex">
                     <!-- Desktop -->
                     <ul class="navbar-nav align-items-baseline d-none d-md-flex">
                         <!-- Settings Dropdown -->
                         @auth
                             <div class="d-none d-md-block">
                                 <x-jet-dropdown id="settingsDropdown">
                                     <x-slot name="trigger">
                                         <img class="rounded-circle" width="32" height="32"
                                             src="{{ Auth::user()->profile_photo_url }}"
                                             alt="{{ Auth::user()->name }}" />
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
                 </ul>
             </div>
         </div>
     </div>
 </nav>
