<div x-data>

    <form wire:submit.prevent="save" role="form text-left" class="mb-4">
        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        {{-- Question 01 --}}
        <div class="mt-3">
            <h6>1) {{ data_get($questions, '0.name') }}</h6>
            <div class=" px-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">

                <label for="question1_option1" style="cursor:pointer">
                    <input type="radio" wire:model="state.question1" value="Never" id="question1_option1"
                        class="mx-2">Never
                </label>

                <label for="question1_option2" style="cursor:pointer">
                    <input type="radio" wire:model="state.question1" value="Not often" id="question1_option2"
                        class="mx-2">Not often
                </label>

                <label for="question1_option3" style="cursor:pointer">
                    <input type="radio" wire:model="state.question1" value="Occasionally" id="question1_option3"
                        class="mx-2">Occasionally
                </label>

                <label for="question1_option4" style="cursor:pointer">
                    <input type="radio" wire:model="state.question1" value="Often" id="question1_option4"
                        class="mx-2">Often
                </label>

                <label for="question1_option5" style="cursor:pointer">
                    <input type="radio" wire:model="state.question1" value="Always" id="question1_option5"
                        class="mx-2">Always
                </label>

                <label for="question1_option6" style="cursor:pointer">
                    <input type="radio" wire:model="state.question1" value="Not sure" id="question1_option6"
                        class="mx-2">Not sure
                </label>
            </div>
            <x-jet-input-error for="question1" />
        </div>

        {{-- Question 02 --}}
        <div class="mt-5">
            <h6>2) {{ data_get($questions, '1.name') }}</h6>
            <div class=" px-4 {{ $errors->has('question2') ? 'is-invalid border-danger' : '' }}">

                <label for="question2_option1" style="cursor:pointer">
                    <input type="radio" wire:model="state.question2" value="Never" id="question2_option1"
                        class="mx-2">Never
                </label>

                <label for="question2_option2" style="cursor:pointer">
                    <input type="radio" wire:model="state.question2" value="Not often" id="question2_option2"
                        class="mx-2">Not often
                </label>

                <label for="question2_option3" style="cursor:pointer">
                    <input type="radio" wire:model="state.question2" value="Occasionally" id="question2_option3"
                        class="mx-2">Occasionally
                </label>

                <label for="question2_option4" style="cursor:pointer">
                    <input type="radio" wire:model="state.question2" value="Often" id="question2_option4"
                        class="mx-2">Often
                </label>

                <label for="question2_option5" style="cursor:pointer">
                    <input type="radio" wire:model="state.question2" value="Always" id="question2_option5"
                        class="mx-2">Always
                </label>

                <label for="question2_option6" style="cursor:pointer">
                    <input type="radio" wire:model="state.question2" value="Not sure" id="question2_option6"
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
            <div class="px-md-4 ">

                <label for="question3_option1" style="cursor:pointer">
                    <input type="radio" wire:model="state.question3" value="Never" id="question3_option1"
                        class="mx-2">Never
                </label>

                <label for="question3_option2" style="cursor:pointer">
                    <input type="radio" wire:model="state.question3" value="Not often" id="question3_option2"
                        class="mx-2">Not often
                </label>

                <label for="question3_option3" style="cursor:pointer">
                    <input type="radio" wire:model="state.question3" value="Occasionally" id="question3_option3"
                        class="mx-2">Occasionally
                </label>

                <label for="question3_option4" style="cursor:pointer">
                    <input type="radio" wire:model="state.question3" value="Often" id="question3_option4"
                        class="mx-2">Often
                </label>

                <label for="question3_option5" style="cursor:pointer">
                    <input type="radio" wire:model="state.question3" value="Always" id="question3_option5"
                        class="mx-2">Always
                </label>

                <label for="question3_option6" style="cursor:pointer">
                    <input type="radio" wire:model="state.question3" value="Not sure" id="question3_option6"
                        class="mx-2">Not sure
                </label>
            </div>
        </div>
        <x-jet-input-error for="question3" />

        <div class="px-5 mt-2 d-flex {{ $errors->has('question4') ? 'is-invalid border-danger' : '' }}">
            <h6>{{ data_get($questions, '3.name') }}</h6>
            <div class="px-md-4 ">

                <label for="question4_option1" style="cursor:pointer">
                    <input type="radio" wire:model="state.question4" value="Never" id="question4_option1"
                        class="mx-2">Never
                </label>

                <label for="question4_option2" style="cursor:pointer">
                    <input type="radio" wire:model="state.question4" value="Not often" id="question4_option2"
                        class="mx-2">Not often
                </label>

                <label for="question4_option3" style="cursor:pointer">
                    <input type="radio" wire:model="state.question4" value="Occasionally" id="question4_option3"
                        class="mx-2">Occasionally
                </label>

                <label for="question4_option4" style="cursor:pointer">
                    <input type="radio" wire:model="state.question4" value="Often" id="question4_option4"
                        class="mx-2">Often
                </label>

                <label for="question4_option5" style="cursor:pointer">
                    <input type="radio" wire:model="state.question4" value="Always" id="question4_option5"
                        class="mx-2">Always
                </label>

                <label for="question4_option6" style="cursor:pointer">
                    <input type="radio" wire:model="state.question4" value="Not sure" id="question4_option6"
                        class="mx-2">Not sure
                </label>
            </div>
        </div>
        <x-jet-input-error for="question4" />
    </form>

</div>
