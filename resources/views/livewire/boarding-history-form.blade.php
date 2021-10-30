<div>
    <h4 class="mb-5">Doggie Daycare and Boarding History</h4>

    {{-- Question 01 : attendend --}}
    <div class="mt-5">
        <h6>1) Has your dog ever attended doggie daycare before?</h6>
        <div class=" px-4">
            <label for="attended_true"><input type="radio" wire:model="state.attendend" value="true" id="attended_true"
                    class="mx-2">Yes</label>
            <label for="attended_false"><input type="radio" wire:model="state.attendend" value="false"
                    id="attended_false" class="mx-2">No</label>
        </div>
    </div>

    {{-- Question 02 : scuffle_event --}}
    <div class="mt-5">
        <h6>2) Has a daycare or boarding facility ever reported on a "scuflle" or other aggresive event that occurred
            while your dog was there? Please note, involvelment in a scuffle will not automatically preclude your pet
            from being in the office, scuffles can happen for many reason. Please be honest</h6>
        <div class=" px-4">
            <label for="scuffle_event_true"><input type="radio" wire:model="state.scuffle_event" value="true"
                    id="scuffle_event_true" class="mx-2">Yes</label>
            <label for="scuffle_event_false"><input type="radio" wire:model="state.scuffle_event" value="false"
                    id="scuffle_event_false" class="mx-2">No</label>
        </div>
    </div>

    <div class="mt-3">
        <h6>If yes, please describe what you know about the event(s)?</h6>
        <div>
            <textarea row="4" wire:model="state.scuffle_description" class="col-12 col-md-7"></textarea>
        </div>
    </div>

    {{-- Question 03 : forbidden_assistance--}}
    <div class="mt-5">
        <h6>3) Has your dog ever been asked not to come back to doggie daycare for behavioral reasons?</h6>
        <div class=" px-4">
            <label for="forbidden_assistance_true"><input type="radio" wire:model="state.forbidden_assistance"
                    value="true" id="forbidden_assistance_true" class="mx-2">Yes</label>
            <label for="forbidden_assistance_false"><input type="radio" wire:model="state.forbidden_assistance"
                    value="false" id="forbidden_assistance_false" class="mx-2">No</label>
        </div>
    </div>

    {{-- Question 04 : accomodations--}}
    <div class="mt-5">
        <h6>4) has your dog ever need special accommodations in a doggie daycare or boarding facility for behavioral
            reasons?</h6>
        <div class=" px-4">
            <label for="accomodations_true"><input type="radio" wire:model="state.accomodations" value="true"
                    id="accomodations_true" class="mx-2">Yes</label>
            <label for="accomodations_false"><input type="radio" wire:model="state.accomodations" value="false"
                    id="accomodations_false" class="mx-2">No</label>
        </div>
    </div>

    <div class="mt-3">
        <h6>If yes, please explain</h6>
        <div>
            <textarea row="4" wire:model="state.accomodations_description" class="col-12 col-md-7"></textarea>
        </div>
    </div>

    {{-- Question 04 : comments --}}
    <div class="mt-5">
        <h6>Anything to add about doggie daycare or boarding:</h6>
        <div>
            <textarea row="4" wire:model="state.comments" class="col-12 col-md-7"></textarea>
        </div>
    </div>

</div>
