<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Reservations') }}
    </x-slot>

    <x-slot name="description">
        Select a date to bring yout dog to work!
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <div class="p-2">
            <h6>{{ __('Choose your pet') }}</h6>
            @foreach ($pets as $pet)
                <div
                    class="mb-3 border rounded-lg px-2 pt-2 {{ $errors->has('pet_id') ? 'is-invalid border-danger' : '' }}">
                    <div class="form-check">
                        <input class="form-check-input {{ $errors->has('pet_id') ? 'is-invalid' : '' }}" type="radio"
                            name="pet_id" id="{{ $pet->id }}" value="{{ $pet->id }}"
                            wire:model="state.pet_id">
                        <label class="text-lg custom-control-label" for="{{ $pet->id }}">{{ $pet->name }}</label>
                    </div>
                </div>
            @endforeach
            <x-jet-input-error for="pet_id" />

        </div>

        <div class="p-2 ">
            <h6>Choose a date</h6>
            <div class="mb-3 col-12 ">
                <x-jet-input id="date" type="date" class="{{ $errors->has('date') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.date" />
                <x-jet-input-error for="date" />
            </div>
        </div>

        <div class="p-2 d-flex justify-content-between">
            <a href="{{ route('welcome') }}" class="btn btn-outline-primary btn-sm">Cancel</a>
            <button class="btn btn-primary btn-sm">Book</button>
        </div>
    </x-slot>

    <x-slot name="actions">

    </x-slot>
</x-jet-form-section>
