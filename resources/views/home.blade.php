<x-guest-layout>
    @section('navbar')
        <x-navbar class="py-2 mt-4 shadow blur blur-rounded start-0 end-0" background="light" />
    @endsection

    {{-- @if (session()->has('success')) --}}
    {{-- <div class="p-2 rounded bg-success">{{ session()->get('success') }}</div> --}}
    {{-- @endif --}}


    @push('styles')
        <style type="text/css" media="screen">
            #hero {
                {{-- height: 100vh; --}}
            }

            #header {
                {{-- background-image: linear-gradient(180deg, rgba(55, 167, 148, 1) 0%, rgba(196, 241, 240, 1) 36%, rgba(248, 249, 250, 1) 100%); --}} {{-- height: 30vh; --}}
                /* Position and center the image to scale nicely on all screens */
                {{-- background-position: center; --}} {{-- background-repeat: no-repeat; --}} {{-- background-size: cover; --}} {{-- position: relative; --}} margin-top: 20vh;
            }

            #articles {
                {{-- height: 70vh; --}}
            }

        </style>
    @endpush

    <div id="hero">
        <!-- Hero section -->
        <div class="">
            <div class="text-center row align-items-center h-100 justify-content-center">
                <div id="header" class="d-flex flex-column flex-md-row justify-content-center">
                    <a class="mb-1 me-md-2 btn bg-gradient-primary " href="{{ route('bookings.create') }}">
                        Bring your dog at work!</a>
                    <a class="mb-1 me-md-2 btn bg-gradient-secondary " href="#"><i class="fas fa-dog"></i>
                        &nbsp; Book a Dog walk</a>
                    <a class="mb-1 me-md-2 btn btn-outline-primary " href="{{ route('user-message') }}"><i
                            class="far fa-envelope"></i></i>
                        &nbsp; Message to admin</a>
                </div>
            </div>
        </div>


        <!-- Featured articles -->
        <div id="articles" class="mt-4 col-12">
            <div class="mb-4 ">
                <div class="p-3 pb-0 text-center">
                    <h4 class="mb-1">Featured Articles</h4>
                    <p class="text-sm">Selection of our best articles</p>
                </div>
                <div class="p-3 card-body">
                    <div class="row justify-content-center">
                        <div class="mb-4 col-xl-3 col-md-6 mb-xl-0">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="shadow-xl d-block border-radius-xl">
                                        <img src="{{ asset('dashboard/img/dogs1.jpg') }}" alt="img-blur-shadow"
                                            class="shadow img-fluid border-radius-xl">
                                    </a>
                                </div>
                                <div class="px-1 pb-0 card-body">
                                    <p class="mb-2 text-sm text-gradient text-dark">Article #2</p>
                                    <a href="javascript:;">
                                        <h5>
                                            Modern
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm">
                                        As Uber works through a huge amount of internal management turmoil.
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="mb-0 btn btn-outline-primary btn-sm">View
                                            Article</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-xl-3 col-md-6 mb-xl-0">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="shadow-xl d-block border-radius-xl">
                                        <img src="{{ asset('dashboard/img/dogs2.jpg') }}" alt="img-blur-shadow"
                                            class="shadow img-fluid border-radius-lg">
                                    </a>
                                </div>
                                <div class="px-1 pb-0 card-body">
                                    <p class="mb-2 text-sm text-gradient text-dark">Article #1</p>
                                    <a href="javascript:;">
                                        <h5>
                                            Scandinavian
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm">
                                        Music is something that every person has his or her own specific opinion about.
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="mb-0 btn btn-outline-primary btn-sm">View
                                            Article</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-xl-3 col-md-6 mb-xl-0">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="shadow-xl d-block border-radius-xl">
                                        <img src="{{ asset('dashboard/img/dogs3.jpg') }}" alt="img-blur-shadow"
                                            class="shadow img-fluid border-radius-xl">
                                    </a>
                                </div>
                                <div class="px-1 pb-0 card-body">
                                    <p class="mb-2 text-sm text-gradient text-dark">Article #3</p>
                                    <a href="javascript:;">
                                        <h5>
                                            Minimalist
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm">
                                        Different people have different taste, and various types of music.
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="mb-0 btn btn-outline-primary btn-sm">View
                                            Article</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
