<div x-data>

    <form wire:submit.prevent="save" role="form text-left">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        {{-- Question 01 --}}
        <div class="mt-2">
            <h6 class="text-sm">1) {{ data_get($questions, '0.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">
            </div>
        </div>

        {{-- Question 02 --}}
        <div class="mt-2">
            <h6 class="text-sm">2) {{ data_get($questions, '1.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">
            </div>
        </div>

        {{-- Question 03 --}}
        <div class="mt-2">
            <h6 class="text-sm">3) {{ data_get($questions, '2.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">
            </div>
        </div>

        {{-- Question 04 --}}
        <div class="mt-2">
            <h6 class="text-sm">4) {{ data_get($questions, '3.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">
            </div>
        </div>

        {{-- Question 05 --}}
        <div class="mt-2">
            <h6 class="text-sm">5) {{ data_get($questions, '4.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">
            </div>
        </div>

        {{-- Question 06 --}}
        <div class="mt-2">
            <h6 class="text-sm">6) {{ data_get($questions, '5.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">
            </div>
        </div>

        {{-- Question 07 --}}
        <div class="mt-2">
            <h6 class="text-sm">7) {{ data_get($questions, '6.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">
            </div>
        </div>

        {{-- Question 08 --}}
        <div class="mt-2">
            <h6 class="text-sm">8) {{ data_get($questions, '7.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">
            </div>
        </div>

        {{-- Question 09 --}}
        <div class="mt-2">
            <h6 class="text-sm">9) {{ data_get($questions, '8.name') }}</h6>
            <div class="px-0 px-md-4 {{ $errors->has('question1') ? 'is-invalid border-danger' : '' }}">
            </div>
        </div>

    </form>
</div>
