<div x-data>

    <form wire:submit.prevent="save" role="form text-left">
        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        {{-- Question 01 --}}
        <div class="mt-3">
            <h6>1) {{ data_get($questions, '0.name') }}</h6>
            <div class=" px-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">

                <label for="question1_option1">
                    <input type="radio" wire:model="state.question1" value="Not often" id="question1_option1"
                        class="mx-2">Not often
                </label>

                <label for="question1_option2">
                    <input type="radio" wire:model="state.question1" value="Occasionally often" id="question1_option2"
                        class="mx-2">Occasionally often
                </label>

                <label for="question1_option3">
                    <input type="radio" wire:model="state.question1" value="Not sure" id="question1_option3"
                        class="mx-2">Not sure
                </label>
            </div>
            <x-jet-input-error for="question1" />
        </div>

        {{-- Question 02 --}}
        <div class="mt-5">
            <h6>2) {{ data_get($questions, '1.name') }}</h6>
            <div class=" px-4 {{ $errors->has('question2') ? 'is-invalid border-danger' : '' }}">

                <label for="question2_option1">
                    <input type="radio" wire:model="state.question2" value="Not often" id="question2_option1"
                        class="mx-2">Not often
                </label>

                <label for="question2_option2">
                    <input type="radio" wire:model="state.question2" value="Occasionally often" id="question2_option2"
                        class="mx-2">Occasionally often
                </label>

                <label for="question2_option3">
                    <input type="radio" wire:model="state.question2" value="Not sure" id="question2_option3"
                        class="mx-2">Not sure
                </label>
            </div>
            <x-jet-input-error for="question2" />
        </div>

        {{-- Question 03 --}}
        <div class="mt-5">
            <h6>3) Is your dog frightened, vocal or otherwise appear distressed the following?</h6>
        </div>

        <div class="px-5 mt-4 d-flex {{ $errors->has('question3') ? 'is-invalid border-danger' : '' }}">
            <h6>{{ data_get($questions, '2.name') }}</h6>
            <div class="px-4 ">

                <label for="question3_option1">
                    <input type="radio" wire:model="state.question3" value="No" id="question3_option1"
                        class="mx-2">No
                </label>

                <label for="question3_option2">
                    <input type="radio" wire:model="state.question3" value="Somewhat yes" id="question3_option2"
                        class="mx-2">Somewhat yes
                </label>

                <label for="question3_option3">
                    <input type="radio" wire:model="state.question3" value="Not sure" id="question3_option3"
                        class="mx-2">Not sure
                </label>
            </div>
        </div>
        <x-jet-input-error for="question3" />

        <div class="px-5 mt-2 d-flex {{ $errors->has('question4') ? 'is-invalid border-danger' : '' }}">
            <h6>{{ data_get($questions, '3.name') }}</h6>
            <div class="px-4 ">

                <label for="question4_option1">
                    <input type="radio" wire:model="state.question4" value="No" id="question4_option1"
                        class="mx-2">No
                </label>

                <label for="question4_option2">
                    <input type="radio" wire:model="state.question4" value="Somewhat yes" id="question4_option2"
                        class="mx-2">Somewhat yes
                </label>

                <label for="question4_option3">
                    <input type="radio" wire:model="state.question4" value="Not sure" id="question4_option3"
                        class="mx-2">Not sure
                </label>
            </div>
        </div>
        <x-jet-input-error for="question4" />
    </form>

</div>
