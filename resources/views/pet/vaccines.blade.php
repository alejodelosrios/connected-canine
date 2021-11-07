<x-app-layout>
    <x-card>
        <x-pet-details-wrap :pet="$pet" />

        <livewire:vaccine-form :pet="$pet" />
    </x-card>
</x-app-layout>
