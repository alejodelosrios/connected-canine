<x-guest-layout>
    <section class="mb-8 min-vh-100">
        <x-hero-section img="img/S3.png">
            <x-slot name="title"></x-slot>
        </x-hero-section>

        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <x-card class="mx-auto col-md-8">
                    @if ($step == 1)
                        <h3 class="py-2">User Profile</h3>
                        @livewire('update-profile-information-form',['user'=>$user])
                    @elseif($step == 2)
                        <h3 class="py-2">Pet Profile</h3>
                        @livewire('pet-profile-form')
                    @else
                        <h3 class="py-2t">Dog‐Friendly Office Policy</h3>
                        @include('terms', [ "terms" => $terms ])
                    @endif
                </x-card>
            </div>
        </div>
    </section>

    @livewire('wizard-step-bar', ['config'=>$config, 'step'=> $step])
</x-guest-layout>
