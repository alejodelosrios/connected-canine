<x-app-layout>
    <x-card>
        <h3>Booking</h3>


        <div class=" p-2">
            <h6>Choose a date</h6>
            <div class="mb-3 col-12 col-md-6">
                <x-jet-input id="date" type="date" class="{{ $errors->has('date') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.date" />
                <x-jet-input-error for="date" />
            </div>
        </div>

        <div class="p-2">
            <h6>Choose a your pet</h6>
            @foreach ($pets as $pet)
                <div class="border p-2 mb-3 rounded">
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="pet" id="{{ $pet->id }}"
                            value="{{ $pet->id }}">
                        <label class="custom-control-label" for="{{ $pet->id }}">{{ $pet->name }}</label>
                    </div>
                </div>
            @endforeach
        </div>






    </x-card>
</x-app-layout>>
