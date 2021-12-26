<x-admin-behavior-layout :data="$data">

    <h4 class="mb-5">Doggy Daycare and Boarding History</h4>

    {{-- Question 01 : attended --}}
    <div class="mt-5">
        <h6>1) Has your dog ever attended doggy daycare before?</h6>
        <div class="px-4">
            <label>
                @if (array_key_exists('attended', $behaviors_values))
                    @if ($behaviors_values['attended']) Yes @else No @endif
                @else
                    No answer
                @endif
            </label>
        </div>
    </div>


    {{-- Question 02 : scuffle_event --}}
    <div class="mt-5">
        <h6 :class="{ 'text-muted': !$refs.attended_true.checked }">
            2) Has a daycare or boarding facility ever reported on a "scuflle" or other aggresive event that
            occurred while your dog was there? Please note, involvelment in a scuffle will not automatically
            preclude your pet from being in the office, scuffles can happen for many reason. Please be honest
        </h6>
        <div class="px-4">
            @if (array_key_exists('scuffle_event', $behaviors_values))
                @if ($behaviors_values['scuffle_event'] && $attended)
                    <div>Yes</div>
                    <div>{{ $behaviors_values['scuffle_description'] }}</div>
                @else
                    <div>No</div>
                @endif
            @else
                No answer
            @endif
        </div>
    </div>


    {{-- Question 03 : forbidden_assistance --}}
    <div class="mt-5">
        <h6 :class="{'text-muted': !$refs.attended_true.checked}">
            3) Has your dog ever been asked not to come back to doggy daycare for behavioral reasons?
        </h6>
        <div class="px-4">
            @if (array_key_exists('forbidden_assistance', $behaviors_values))
                @if ($behaviors_values['forbidden_assistance'] && $attended)
                    Yes
                @else
                    No
                @endif
            @else
                No answer
            @endif
        </div>
    </div>

    {{-- Question 04 : accomodations --}}
    <div class="mt-5">
        <h6 :class="!$refs.attended_true.checked && 'text-muted'">
            4) has your dog ever need special accommodations in a doggy daycare or boarding facility for behavioral
            reasons?
        </h6>
        <div class="px-4">
            @if (array_key_exists('accomodations', $behaviors_values))
                @if ($behaviors_values['accomodations'] && $attended)
                    <div>Yes</div>
                    <div>{{ $behaviors_values['accomodations_description'] }}</div>
                @else
                    No
                @endif
            @else
                No answer
            @endif
        </div>
    </div>


    {{-- Question 04 : comments --}}
    <div class="mt-5">
        <h6 :class="!$refs.attended_true.checked && 'text-muted'">
            Anything to add about doggy daycare or boarding:
        </h6>
        <div class="px-4">
            @if (array_key_exists('comments', $behaviors_values) && $attended)
                {{ $behaviors_values['comments'] }}
            @else
                No comments
            @endif
        </div>
    </div>

    <x-slot name="footer"></x-slot>

</x-admin-behavior-layout>
