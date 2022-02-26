<x-app-layout>
    <div class="p-4">

        <x-pet-create-wizard-steps :step="$step" :pet="$pet" />

        @error('veterinarian')
            @php
                $error = true;
            @endphp
        @enderror

        <livewire:veterinarian-form :pet="$pet" :hasError="$error" />

        <hr class="my-6">

        <livewire:medical-history-form :pet="$pet" />

        <hr class="my-6">

        <livewire:medication-form :pet="$pet" />

        <div class="d-flex align-items-baseline justify-content-end mt-4">
            <a href="{{ $redirectBack }}" class="mx-2 btn btn-secondary">
                {{ __('Back') }}
            </a>

            <a href="{{ $redirecTo }}" class=" btn btn-primary">
                {{ __('Next') }}
            </a>
        </div>

    </div>
</x-app-layout>
