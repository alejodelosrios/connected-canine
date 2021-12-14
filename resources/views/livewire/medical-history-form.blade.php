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
                Does your currently have any of the following medical conditions? Check all tha apply.
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

    </x-slot>

    <x-slot name="actions">
        <div class="d-flex align-items-baseline">
            <button class="ml-auto btn btn-icon btn-3 btn-primary" type="button" wire:click="save">Save</button>
        </div>
    </x-slot>
</x-jet-form-section>
