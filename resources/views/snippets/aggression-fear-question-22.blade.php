 <div class="px-0 px-md-4 {{ $errors->has('question22') ? 'is-invalid border-danger' : '' }}">
     <div class="row row-cols-2 row-cols-md-5 ">
         <div class="p-1 col h-100">
             <x-dog-option value="Averts gaze" key="question22_option1" wire:model="state.question22.value"
                 image="averts-gaze" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Barks" key="question22_option2" wire:model="state.question22.value" image="barks" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Bites" key="question22_option3" wire:model="state.question22.value" image="bites" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Growls" key="question22_option4" wire:model="state.question22.value" image="growls" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Jumps" key="question22_option5" wire:model="state.question22.value" image="jumps" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Lunges" key="question22_option6" wire:model="state.question22.value"
                 image="attempts-scape" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Retreats" key="question22_option7" wire:model="state.question22.value"
                 image="retreats" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Stiffens body" key="question22_option8" wire:model="state.question22.value"
                 image="stiffens-body" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Raises back hair" key="question22_option9" wire:model="state.question22.value"
                 image="raises-back-hair" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Tucks tail" key="question22_option10" wire:model="state.question22.value"
                 image="tucks-tail" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Ignores" key="question22_option11" wire:model="state.question22.value"
                 image="ignores" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Plays" key="question22_option12" wire:model="state.question22.value" image="plays" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Urinates" key="question22_option13" wire:model="state.question22.value"
                 image="urinates" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Rolls over" key="question22_option14" wire:model="state.question22.value"
                 image="rolls-over" />
         </div>
         <div class="p-1 col h-100">
             <x-dog-option value="Casually greets" key="question22_option15" wire:model="state.question22.value"
                 image="cassually-greets" />
         </div>
     </div>
     <div class="my-1 col-12 col-md-6">
         <x-jet-input class=" {{ $errors->has('state.question22.comments') ? 'is-invalid' : '' }}"
             wire:model="state.question22.comments" placeholder="Other" />
     </div>
 </div>
