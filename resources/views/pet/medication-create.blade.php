<x-app-layout>
    <x-card>
        <x-pet-details-wrap :pet="$pet" title="Medical" />
        @livewire('medication-form', ['pet'=>$pet])
    </x-card>
</x-app-layout>
