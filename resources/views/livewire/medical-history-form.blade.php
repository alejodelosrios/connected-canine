<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Medical Information') }}
    </x-slot>

    <x-slot name="description"></x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>


        <div class="w-100">
            <h6>
                Does your dog currently have any of the following
                medical conditions? Check all that apply
            </h6>
            <div>
                @foreach ($contidtions as $condition)
                    <div>
                        <label for="question1_option1" style="cursor:pointer">
                            <input type="checkbox" wire:model="state.medical_conditions" value="{{ $condition }}"
                                id="question1_option.{{ $loop->index }}" class="mx-2">{{ $condition }}
                        </label>
                    </div>
                @endforeach

                <x-jet-input-error for="medical_conditions" />
            </div>

            <h6 class="mt-4">
                Does your dog have any allergies? If yes, please list below.
            </h6>
            <textarea rows="5" class="form-control {{ $errors->has('allergies') ? 'is-invalid' : '' }}"
                wire:model="state.allergies" id="question2_option1"
                placeholder="e.g. food allergies, grasses, pollen, mold, dust mites, cigarette smoke, feathers, chemicals, pests, medicines"></textarea>
            <x-jet-input-error for="allergies" />

            <div class="my-4">
                <x-jet-label class="mb-2" for="parasite_control"
                    value="{{ __('Is parasite control is being done on a routine basis and your dog free of ticks and fleas? ') }}" />
                <div class="form-group w-25">
                    <select class="form-control {{ $errors->has('parasite_control') ? 'is-invalid' : '' }}"
                        id="parasite_control" wire:model.defer="state.parasite_control">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                    <x-jet-input-error for="parasite_control" />
                </div>
            </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-button wire:click="save">
            <div wire:loading class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>

            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
