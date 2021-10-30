<div x-data>

    <h4 class="mb-5">Doggie Daycare and Boarding History</h4>

    <form wire:submit.prevent="save" role="form text-left">

        {{-- Question 01 : attended --}}
        <div class="mt-5">
            <h6>1) Has your dog ever attended doggie daycare before?</h6>
            <div class=" px-4 {{ $errors->has('attended') ? 'is-invalid border-danger' : '' }}">
                <label for="attended_true"><input type="radio" wire:model="state.attended" value="1"
                        id="attended_true" class="mx-2" x-ref="attended_true">Yes</label>
                <label for="attended_false"><input type="radio" wire:model="state.attended" value="0"
                        id="attended_false" class="mx-2">No</label>
            </div>
            <x-jet-input-error for="attended" />
        </div>


        {{-- Question 02 : scuffle_event --}}
        <div class="mt-5">
            <h6 :class="{ 'text-muted': !$refs.attended_true.checked }">2) Has a daycare or boarding facility ever
                reported
                on a "scuflle" or other aggresive event that occurred
                while your dog was there? Please note, involvelment in a scuffle will not automatically preclude your
                pet
                from being in the office, scuffles can happen for many reason. Please be honest</h6>
            <div class=" px-4  {{ $errors->has('scuffle_event') ? 'is-invalid border-danger' : '' }}">
                <label for="scuffle_event_true">
                    <input :disabled="!$refs.attended_true.checked" type="radio" wire:model="state.scuffle_event"
                        value="1" id="scuffle_event_true" class="mx-2" x-ref="scuffle_event_true">
                    <span :class="$refs.attended_true.checked || 'text-muted'">Yes</span>
                </label>
                <label :class="$refs.attended_true.checked || 'text-muted'" for="scuffle_event_false"><input
                        :disabled="!$refs.attended_true.checked" type="radio" wire:model="state.scuffle_event"
                        value="0" id="scuffle_event_false" class="mx-2">No</label>
            </div>
            <x-jet-input-error for="scuffle_event" />
        </div>
        <div class="mt-3">
            <h6 :class="{'text-muted': !$refs.scuffle_event_true.checked || !$refs.attended_true.checked}">
                If yes, please describe what you know about the event(s)?</h6>
            <div class="{{ $errors->has('scuffle_description') ? 'is-invalid border-danger' : '' }}">
                <textarea :disabled="!$refs.scuffle_event_true.checked || !$refs.attended_true.checked" row="4"
                    wire:model="state.scuffle_description" class="col-12 col-md-7"></textarea>
            </div>
            <x-jet-input-error for="scuffle_description" />
        </div>

        {{-- Question 03 : forbidden_assistance --}}
        <div class="mt-5">
            <h6 :class="  {'text-muted': !$refs.attended_true.checked}">3) Has your dog ever been asked not to come
                back to doggie daycare for behavioral reasons?</h6>
            <div class="px-4 {{ $errors->has('forbidden_assistance') ? 'is-invalid border-danger' : '' }}">
                <label :class="!$refs.attended_true.checked && 'text-muted'" for="forbidden_assistance_true"><input
                        :disabled="!$refs.attended_true.checked" type="radio" wire:model="state.forbidden_assistance"
                        value="1" id="forbidden_assistance_true" class="mx-2">Yes</label>
                <label :class="!$refs.attended_true.checked && 'text-muted'" for="forbidden_assistance_false"><input
                        :disabled="!$refs.attended_true.checked" type="radio" wire:model="state.forbidden_assistance"
                        value="0" id="forbidden_assistance_false" class="mx-2">No</label>
            </div>
            <x-jet-input-error for="forbidden_assistance" />
        </div>

        {{-- Question 04 : accomodations --}}
        <div class="mt-5">
            <h6 :class="    !$refs.attended_true.checked && 'text-muted'">4) has your dog ever need special
                accommodations
                in a
                doggie daycare or boarding facility for behavioral reasons?</h6>
            <div class="px-4 {{ $errors->has('accomodations') ? 'is-invalid border-danger' : '' }}">
                <label :class="!$refs.attended_true.checked && 'text-muted'" for="accomodations_true"><input
                        :disabled="!$refs.attended_true.checked" type="radio" wire:model="state.accomodations"
                        value="1" id="accomodations_true" class="mx-2"
                        x-ref="accomodations_true">Yes</label>
                <label :class="!$refs.attended_true.checked && 'text-muted'" for="accomodations_false"><input
                        :disabled="!$refs.attended_true.checked" type="radio" wire:model="state.accomodations"
                        value="0" id="accomodations_false" class="mx-2">No</label>
            </div>
            <x-jet-input-error for="accomodations" />
        </div>
        <div class="mt-3">
            <h6 :class="    {'text-muted': !$refs.accomodations_true.checked || !$refs.attended_true.checked}">If yes,
                please
                explain</h6>
            <div>
                <textarea
                    class="col-12 col-md-7 {{ $errors->has('accomodations_description') ? 'is-invalid border-danger' : '' }}"
                    :class="{'text-muted': !$refs.accomodations_true.checked || !$refs.attended_true.checked}"
                    :disabled="!$refs.accomodations_true.checked || !$refs.attended_true.checked" row="4"
                    wire:model="state.accomodations_description"></textarea>
            </div>
            <x-jet-input-error for="accomodations_description" />
        </div>

        {{-- Question 04 : comments --}}
        <div class="mt-5">
            <h6 :class="!$refs.attended_true.checked && 'text-muted'">Anything to add about doggie daycare or
                boarding:
            </h6>
            <div class="{{ $errors->has('comments') ? 'is-invalid border-danger' : '' }}">
                <textarea :class="!$refs.attended_true.checked && 'text-muted'" :disabled="!$refs.attended_true.checked"
                    row="4" wire:model="state.comments" class="col-12 col-md-7"></textarea>
            </div>
            <x-jet-input-error for="comments" />
        </div>

    </form>
</div>
