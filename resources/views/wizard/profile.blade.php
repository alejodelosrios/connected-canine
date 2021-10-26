<x-guest-layout>
{{-- TODO: DEPRECATE - BORRAR --}}
    <style>
        .transition {
            transition: all 1s ease-out;

        }

        .-translate-100 {
            transform: translate(-100%);
        }

        .translate-100 {
            transform: translate(100%);
        }

        .translate-none {
            transform: translate(0);
        }

    </style>
    <div x-data="{ view : 1, next(){ this.view == 1 ? this.view = 2 : alert(this.view)}}">

        <div x-show="view==1" x-transition:enter="transition" x-transition:enter-start="translate-100"
            x-transition:enter-end="translate-none" x-transition:leave="transition"
            x-transition:leave-start="translate-none" x-transition:leave-end="-translate-100">
            @livewire('profile.update-profile-information-form')
        </div>

        <div x-show="view==2" x-transition:enter="transition" x-transition:enter-start="translate-100"
            x-transition:enter-end="translate-none" x-transition:leave="transition"
            x-transition:leave-start="translate-none" x-transition:leave-end="-translate-100">
            @livewire('pet-profile-form')
        </div>

        <div class="fixed-bottom bg-white border text-right pt-3 px-3">
            <button x-show="view==2" class="btn btn-dark btn-sm float-start" @click="view = 1" x-cloak>Previous</button>
            <button class="btn btn-primary btn-sm float-end " @click="next" wire:click="$emit('updateProfileInformation')">Next</button>
        </div>
    </div>

</x-guest-layout>
