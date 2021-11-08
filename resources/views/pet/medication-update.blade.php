<x-app-layout>
    <x-card>
        <x-pet-details-wrap :pet="$pet" />
            @livewire('medication-form', ['pet'=>$pet, "medication" => $medication])
    </x-card>
</x-app-layout>
