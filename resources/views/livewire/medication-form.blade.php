<div>
    <form wire:submit.prevent="save" role="form text-left">
        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <div class="row">
            {{-- Name --}}
            <div class="mb-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>

            {{-- Status --}}
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="status" value="{{ __('Status') }}" />
                <div class="form-group">
                    <select id="status" type="select"
                        class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>

            {{-- Frequency --}}
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="frequency" value="{{ __('Frequency') }}" />
                <div class="form-group">
                    <select class="form-control {{ $errors->has('frequency') ? 'is-invalid' : '' }}" id="frequency"
                        wire:model.defer="state.frequency">
                        <option value="hourly">Hourly</option>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                    </select>
                </div>
            </div>
            {{-- Medication time blocks --}}
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="time_block" value="{{ __('Select medication time blocks') }}" />
                <div class="form-group">
                    <select class="form-control {{ $errors->has('time_block') ? 'is-invalid' : '' }}" id="time_block"
                        wire:model.defer="state.time_block">
                        <option value="morning">Morning</option>
                        <option value="afternoon">Afternoon</option>
                        <option value="evening">Evening</option>
                    </select>
                </div>
            </div>

            {{-- Prescription --}}
            <div class="mb-3 col-12 col-md-3">
                <x-jet-label for="prescription" value="{{ __('Prescription') }}" />
                <div class="form-group">
                    <select class="form-control {{ $errors->has('prescription') ? 'is-invalid' : '' }}"
                        id="prescription" wire:model.defer="state.prescription">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            {{-- Purpose --}}
            <div class="mb-3 col-12">
                <x-jet-label for="purpose" value="{{ __('Purpose') }}" />
                <textarea wire:model.defer="state.purpose" name="purpose" id="purpose"
                    class="form-control  {{ $errors->has('purpose') ? 'is-invalid' : '' }}"></textarea>
                <x-jet-input-error for="purpose" />
            </div>

            {{-- Medication dosage --}}
            {{--<div class="mb-3 col-12">--}}
                {{--<x-jet-label for="dosage" value="{{ __('Medication dosage') }}" />--}}
                {{--<textarea wire:model.defer="state.dosage" name="dosage" id="dosage"--}}
                    {{--class="form-control  {{ $errors->has('dosage') ? 'is-invalid' : '' }}"></textarea>--}}
                {{--<x-jet-input-error for="dosage" />--}}
            {{--</div>--}}

            {{-- Medication instructions --}}
            {{--<div class="mb-3 col-12">--}}
                {{--<x-jet-label for="instructions" value="{{ __('Medication instructions') }}" />--}}
                {{--<textarea wire:model.defer="state.instructions" name="instructions" id="instructions"--}}
                    {{--class="form-control  {{ $errors->has('instructions') ? 'is-invalid' : '' }}"></textarea>--}}
                {{--<x-jet-input-error for="instructions" />--}}
            {{--</div>--}}

        </div>

        {{-- Actions --}}
        <div class="d-flex align-items-baseline justify-content-end">
            <a href="{{ route('pet.medications', $pet) }}" class="btn btn-secondary me-2">
                {{ __('Cancel') }}
            </a>
            <x-jet-button type="submit">
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                {{ __('Save') }}
            </x-jet-button>
        </div>
    </form>
</div>
