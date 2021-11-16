<div class="pb-5" x-data>

    <form wire:submit.prevent="save" role="form text-left">
        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        {{-- Question 01 --}}
        <h6 class="mt-2 text-sm">1) How relaxed or stressed is your dog with familiar people do the following</h6>
        <div class="row row-cols-1 row-cols-md-2 px-md-4">
            <div class="mt-4 col">
                <x-question-t1 key="question1" wire:model="state.question1">
                    {{ data_get($questions, '0.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question2" wire:model="state.question2">
                    {{ data_get($questions, '1.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question3" wire:model="state.question3">
                    {{ data_get($questions, '2.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question4" wire:model="state.question4">
                    {{ data_get($questions, '3.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question5" wire:model="state.question5">
                    {{ data_get($questions, '4.name') }}
                </x-question-t1>
            </div>
        </div>

        {{-- Question 02 --}}
        <h6 class="mt-5 text-sm">2) How relaxed or stressed is your dog when unfamiliar people approach and your dog...
        </h6>
        <div class="row row-cols-1 row-cols-md-2 px-md-4">
            <div class="mt-4 col">
                <x-question-t1 key="question6" wire:model="state.question6">
                    {{ data_get($questions, '5.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question7" wire:model="state.question7">
                    {{ data_get($questions, '6.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question8" wire:model="state.question8">
                    {{ data_get($questions, '7.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question9" wire:model="state.question9">
                    {{ data_get($questions, '8.name') }}
                </x-question-t1>
            </div>
        </div>

        {{-- Question 03 --}}
        <h6 class="mt-5 text-sm">3) How relaxed or stressed is your dog when an unfamiliar person is a...</h6>
        <div class="row row-cols-1 row-cols-md-2 px-md-4">
            <div class="mt-4 col">
                <x-question-t1 key="question10" wire:model="state.question10">
                    {{ data_get($questions, '9.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question11" wire:model="state.question11">
                    {{ data_get($questions, '10.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question12" wire:model="state.question12">
                    {{ data_get($questions, '11.name') }}
                </x-question-t1>
            </div>
        </div>

        {{-- Question 04 --}}
        <h6 class="mt-5 text-sm ">4) How relaxed or stressed is your dog when unfamiliar dogs...</h6>
        <div class="row row-cols-1 row-cols-md-2 px-md-4">
            <div class="mt-4 col">
                <x-question-t1 key="question13" wire:model="state.question13">
                    {{ data_get($questions, '12.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question14" wire:model="state.question14">
                    {{ data_get($questions, '13.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question15" wire:model="state.question15">
                    {{ data_get($questions, '14.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question16" wire:model="state.question16">
                    {{ data_get($questions, '15.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question17" wire:model="state.question17">
                    {{ data_get($questions, '16.name') }}
                </x-question-t1>
            </div>
        </div>

        {{-- Question 05 --}}
        <h6 class="mt-5 text-sm ">5) How relaxed or stressed is your dog when unfamiliar dogs approach and your dog ...
        </h6>
        <div class="row row-cols-1 row-cols-md-2 px-md-4">
            <div class="mt-4 col">
                <x-question-t1 key="question18" wire:model="state.question18">
                    {{ data_get($questions, '17.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question19" wire:model="state.question19">
                    {{ data_get($questions, '18.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question20" wire:model="state.question20">
                    {{ data_get($questions, '19.name') }}
                </x-question-t1>
            </div>
            <div class="mt-4 col">
                <x-question-t1 key="question21" wire:model="state.question21">
                    {{ data_get($questions, '20.name') }}
                </x-question-t1>
            </div>
        </div>

        {{-- Question 06 --}}
        <div class="mt-5">
            <h6 class="text-sm">6) {{ data_get($questions, '21.name') }}</h6>

            @include('snippets.aggression-fear-question-22')
        </div>

        {{-- Question 07 --}}
        <div class="mt-5">
            <h6 class="text-sm">7) {{ data_get($questions, '22.name') }}</h6>

            @include('snippets.aggression-fear-question-23')
        </div>

        {{-- Question 08 --}}
        <div class="mt-5">
            <h6 class="text-sm">8) {{ data_get($questions, '23.name') }}</h6>
            <div class="px-0 px-md-4 col-6 {{ $errors->has('question24') ? 'is-invalid border-danger' : '' }}">
                <x-jet-input class="flex-fill {{ $errors->has('question24') ? 'is-invalid' : '' }}"
                    wire:model="state.question24"  pattern="[0-9]" placeholder="If never, enter 0"/>
            </div>
            <x-jet-input-error for="question24" class="px-0 px-md-4"/>
        </div>

        {{-- Question 09 --}}
        <div class="mt-5">
            <h6 class="text-sm">9) {{ data_get($questions, '24.name') }}</h6>
            <div class="px-0 px-md-4 col-6 {{ $errors->has('question25') ? 'is-invalid border-danger' : '' }}">
                <x-jet-input class="flex-fill {{ $errors->has('question24') ? 'is-invalid' : '' }}"
                    wire:model="state.question25"  pattern="[0-9]" placeholder="If never, enter 0"/>
            </div>
            <x-jet-input-error for="question25" class="px-0 px-md-4"/>
        </div>

    </form>
</div>
