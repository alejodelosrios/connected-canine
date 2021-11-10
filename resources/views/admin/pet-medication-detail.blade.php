<x-app-layout>
    <x-card>
        <x-pet-details-wrap :pet="$pet" title="Pet Medications" />
        <div class="row">
            {{-- Name --}}
            <div class="mb-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <p>{{ $medication->name }}</p>
            </div>

            {{-- Status --}}
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="status" value="{{ __('Status') }}" />
                <p>{{$medication->status == 1 ? "Active" : "Inactive"}}</p>
            </div>

            {{-- Frequency --}}
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="frequency" value="{{ __('Frequency') }}" />
                <p>{{ $medication->frequency }}</p>
            </div>
            {{-- Medication time blocks --}}
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="time_block" value="{{ __('Select medication time blocks') }}" />
                <p>{{ $medication->time_block }}</p>
            </div>

            {{-- Prescription --}}
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="prescription" value="{{ __('Prescription') }}" />
                <p>{{$medication->prescription == 1 ? "Yes" : "No"}}</p>
            </div>
            {{-- Purpose --}}
            <div class="mb-3 col-12">
                <x-jet-label for="purpose" value="{{ __('Purpose') }}" />
                <p>{{ $medication->purpose }}</p>
            </div>

            {{-- Medication dosage --}}
            <div class="mb-3 col-12">
                <x-jet-label for="dosage" value="{{ __('Medication dosage') }}" />
                <p>{{ $medication->dosage }}</p>
            </div>

            {{-- Medication instructions --}}
            <div class="mb-3 col-12">
                <x-jet-label for="instructions" value="{{ __('Medication instructions') }}" />
                <p>{{ $medication->instructions }}</p>
            </div>
        </div>
    </x-card>
</x-app-layout>
