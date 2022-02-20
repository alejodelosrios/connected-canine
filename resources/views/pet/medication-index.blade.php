<x-app-layout>

    <x-pet-details-wrap :pet="$pet" title="Medical" />


    @livewire('veterinarian-form', ['pet'=>$pet])

    <hr class="my-6">

    @livewire('medical-history-form', ['pet'=>$pet])

    <hr class="my-6">

    @livewire('medication-form',['pet'=>$pet])


</x-app-layout>
