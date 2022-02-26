<x-app-layout>
    <div class="p-4">
        <x-pet-create-wizard-steps :step="$step" :pet="$pet" />

        <x-card>
            <h4 class="mb-4">Separation & Confinement</h4>
            <livewire:separation-confinement-form :pet="$pet" />

            <x-slot name="footer">
                <div class="d-flex align-items-baseline justify-content-end">
                    <livewire:create-pet-wizard-buttons :redirecTo="$redirecTo" :redirectBack="$redirectBack"
                        :id="$pet->id" />
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
