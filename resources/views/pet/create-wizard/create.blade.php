<x-app-layout>
    <div class="p-4">
        <x-pet-create-wizard-steps :step="$step" />

        <x-card>
            <livewire:pet-profile-form :pet="$pet" />

            <x-slot name="footer">
                <div class="d-flex align-items-baseline justify-content-end">
                    <livewire:create-pet-wizard-buttons :redirecTo="$redirecTo" :redirectBack="$redirectBack" />
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
