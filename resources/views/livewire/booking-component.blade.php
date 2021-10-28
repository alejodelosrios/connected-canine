<div class="py-5 ">
    <form wire:submit.prevent="save" role="form text-left" class="py-6 mx-auto col-12 col-md-4">
        <x-card>

            <h3>Booking</h3>

            <div class="p-2">
                <h6>Choose a your pet</h6>
                @foreach ($pets as $pet)
                    <div class="mb-3 border rounded-lg px-2 pt-2">
                        <div class="form-check  ">
                            <input class="form-check-input" type="radio" name="pet" id="{{ $pet->id }}"
                                value="{{ $pet->id }}" wire:model="state.pet_id">
                            <label class="custom-control-label text-lg"
                                for="{{ $pet->id }}">{{ $pet->name }}</label>
                            <x-jet-input-error for="state.pet_id" />
                        </div>
                    </div>
                @endforeach
            </div>

            <div class=" p-2">
                <h6>Choose a date</h6>
                <div class="mb-3 col-12 ">
                    <x-jet-input id="date" type="date" class="{{ $errors->has('date') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.date" />
                    <x-jet-input-error for="state.date" />
                </div>
            </div>

            <div class="d-flex justify-content-end p-2">
                <button class="btn btn-primary btn-sm">Book</button>
            </div>
        </x-card>
    </form>
</div>
