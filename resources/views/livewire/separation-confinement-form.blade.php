<div x-data>

    <h4 class="mb-5">Behavioral Background</h4>

    <form wire:submit.prevent="save" role="form text-left">
        
        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        {{-- Question 01 --}}
        <div class="mt-5">
            <h6>1) {{ data_get($questions, '0.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">

                <div class="row" style="min-height:150px">
                    <div class="p-1 col-6 col-md-3" style="height:100px; ">
                        <x-dog-option value="Attempts Escape" key="question1_option1"
                            wire:model="state.question1.value" />
                    </div>

                    <div class="p-1 col-6 col-md-3" style="height:100px; ">
                        <x-dog-option value="Whines" key="question1_option2" wire:model="state.question1.value" />
                    </div>

                    <div class="p-1 col-6 col-md-3" style="height:100px; ">
                        <x-dog-option value="Trembles" key="question1_option3" wire:model="state.question1.value" />
                    </div>

                    <div class="p-1 col-6 col-md-3" style="height:100px; ">
                        <x-dog-option value="Urinates" key="question1_option4" wire:model="state.question1.value" />
                    </div>
                </div>

                <div class="row" style="min-height:150px">
                    <div class="p-1 col-6 col-md-3" style="height:100px; ">
                        <x-dog-option value="Barks" key="question1_option5" wire:model="state.question1.value" />
                    </div>

                    <div class="p-1 col-6 col-md-3" style="height:100px; ">
                        <x-dog-option value="Defecates" key="question1_option6"
                            wire:model="state.question1.value" />
                    </div>

                    <div class="p-1 col-6 col-md-3" style="height:100px; ">
                        <x-dog-option value="Destroys things" key="question1_option7"
                            wire:model="state.question1.value" />
                    </div>

                    <div class="p-1 col-6 col-md-3" style="height:100px; ">
                        <x-dog-option value="Paces" key="question1_option8" wire:model="state.question1.value" />
                    </div>
                </div>

                <div class="my-1">
                    <label class="pb-1 flex-column col-12 col-md-6 h-100 d-flex flex-md-row" for="question1_option9">
                        <span class="p-2 fs-6">{{ __('Other') }}</span>

                        <x-jet-input class="flex-fill {{ $errors->has('comments') ? 'is-invalid' : '' }}"
                            wire:model="state.question1.comments" id="question1_option9" />
                    </label>
                </div>
            </div>
        </div>

        {{-- Question 02 --}}
        <div class="mt-5">

            <h6>2) {{ data_get($questions, '1.name') }}</h6>

            <div class=" px-4 {{ $errors->has('question2.value') ? 'is-invalid border-danger' : '' }}">

                <label for="question2_option1">
                    <input type="radio" wire:model="state.question2.value" value="Never" id="question2_option1"
                        class="mx-2" required>Never
                </label>

                <label for="question2_option2">
                    <input x-ref="occasionally" type="radio" wire:model="state.question2.value" value="Occasionally"
                        id="question2_option2" class="mx-2">Occasionally
                </label>

                <label for="question2_option3">
                    <input type="radio" wire:model="state.question2.value" value="Always" id="question2_option3"
                        class="mx-2">Alway
                </label>

            </div>
            <x-jet-input-error for="question2.value" />

            <div class="my-1">
                <label class="pb-1 h-100" for="question2_option4">
                    <span :class="{'text-muted': !$refs.occasionally.checked}"
                        class="p-2 my-2">{{ __('If you selected "Ocassionally", what are de circumstances surrounding times when your acts distressed?') }}</span>

                    <textarea rows="5" :disabled="!$refs.occasionally.checked"
                        class="form-control {{ $errors->has('question2.comments') ? 'is-invalid' : '' }}"
                        wire:model="state.question2.comments" id="question2_option4"
                        placeholder="e.g., only when I'm not around, only when there are no other people or dogs around, etc." /></textarea>
                    <x-jet-input-error for="question2.comments" />
                </label>
            </div>

        </div>
    </form>
</div>
