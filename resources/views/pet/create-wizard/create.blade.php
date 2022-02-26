<x-app-layout>
    <div class="p-4">
        <x-pet-create-wizard-steps :step="$step" :pet="$pet" />
        <p>Your dog sounds great! Please tell us little more.</p>
        <p>
            The following buttons will guide you through questionnaire
            which takes about 20 minutes to complete. Once complete, click submit.
        </p>
        <x-card>
            <h4>Pet Profile</h4>
            <livewire:pet-profile-form :pet="$pet" />

            <x-slot name="footer">
                <div class="d-flex align-items-baseline justify-content-end">
                    <livewire:create-pet-wizard-buttons :redirecTo="$redirecTo" :redirectBack="$redirectBack" />
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
