<x-guest-layout>
    <section class="mb-8 min-vh-100">
        <x-hero-section img="dashboard/img/curved-images/curved14.jpg">
            <x-slot name="title"></x-slot>
        </x-hero-section>

        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <x-card class="mx-auto col-md-8">
                    @if ($step == 1)
                        @livewire('profile.update-profile-information-form')
                    @else
                        @livewire('pet-profile-form')
                    @endif
                </x-card>
            </div>
        </div>
    </section>

    @livewire('wizard-step-bar', ['config'=>$config, 'step'=> $step])
</x-guest-layout>
