<div class="px-0 px-md-4 {{ $errors->has('question23') ? 'is-invalid border-danger' : '' }}">

    <div class="row row-cols-2 row-cols-md-5 ">
        <div class="p-1 col h-100">
            <x-dog-option value="Averts gaze" key="question23_option1" wire:model="state.question23.value"
                image="averts-gaze" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Barks" key="question23_option2" wire:model="state.question23.value" image="barks" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Bites" key="question23_option3" wire:model="state.question23.value" image="bites" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Growls" key="question23_option4" wire:model="state.question23.value" image="growls" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Jumps" key="question23_option5" wire:model="state.question23.value" image="jumps" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Lunges" key="question23_option6" wire:model="state.question23.value"
                image="lunges" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Retreats" key="question23_option7" wire:model="state.question23.value"
                image="retreats" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Stiffens body" key="question23_option8" wire:model="state.question23.value"
                image="stiffens-body" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Raises back hair" key="question23_option9" wire:model="state.question23.value"
                image="raises-back-hair" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Tucks tail" key="question23_option10" wire:model="state.question23.value"
                image="tucks-tail" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Ignores" key="question23_option11" wire:model="state.question23.value"
                image="ignores" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Plays" key="question23_option12" wire:model="state.question23.value" image="plays" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Urinates" key="question23_option13" wire:model="state.question23.value"
                image="urinates" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Rolls over" key="question23_option14" wire:model="state.question23.value"
                image="rolls-over" />
        </div>
        <div class="p-1 col h-100">
            <x-dog-option value="Cassually greets" key="question23_option15" wire:model="state.question23.value"
                image="cassually-greets" />
        </div>
    </div>
    <div class="my-1 col-12 col-md-6">
        <x-jet-input class=" {{ $errors->has('state.question23.comments') ? 'is-invalid' : '' }}"
            wire:model="state.question23.comments" placeholder="Other" />
    </div>
</div>
