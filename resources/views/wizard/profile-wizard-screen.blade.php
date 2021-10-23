<x-guest-layout>

    <div>

        <section class="mb-8 min-vh-100">
            <x-hero-section img="dashboard/img/curved-images/curved14.jpg">
                <x-slot name="title">
                    <span x-text="()=>view == 1 ? 'User Profile' : 'Pet Profile'"></span>
                </x-slot>
            </x-hero-section>

            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="mx-auto col-md-8">
                        @if ($step == 1)
                            @livewire('profile.update-profile-information-form')
                        @else
                            @livewire('pet-profile-form')
                        @endif
                    </div>
                </div>
            </div>
        </section>




        <div class="px-3 pt-3 text-right bg-white border fixed-bottom d-flex justify-content-between">

            <div>
                @if ($step == 2)
                    <a href="{{ route('wizard.profile', 1) }}" class="btn btn-outline-primary text-uppercase">
                        Previous
                    </a>
                @endif
            </div>

            <div>
                <a href="{{ $step == 1 ? route('wizard.profile', 2) : route('welcome') }}"
                    class="btn btn-primary text-uppercase">
                    {{ __('Next') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
