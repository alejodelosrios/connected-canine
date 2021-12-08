<x-admin-behavior-layout :data="$data">

    <div>

        {{-- Question 01 --}}
        <div class="mt-3">
            <h6>1) {{ data_get($questions, '0.name') }}</h6>
            <div class="px-4">
                @if (isset($behaviors_values[0])) {{ $behaviors_values[0] }} @else No answer @endif
            </div>
        </div>

        {{-- Question 02 --}}
        <div class="mt-5">
            <h6>2) {{ data_get($questions, '1.name') }}</h6>
            <div class="px-4">
                @if (isset($behaviors_values[1])) {{ $behaviors_values[1] }} @else No answer @endif
            </div>

        </div>

        {{-- Question 03 --}}
        <div class="mt-5">
            <h6>3) Is your pet frightened, vocalize or otherwise appear distressed the following?</h6>
        </div>

        <div class="px-5 mt-4 d-flex ">
            <h6>{{ data_get($questions, '2.name') }}</h6>
            <div class="px-4 ">
                @if (isset($behaviors_values[2])) {{ $behaviors_values[2] }} @else No answer @endif
            </div>
        </div>

        <div class="px-5 mt-2 d-flex">
            <h6>{{ data_get($questions, '3.name') }}</h6>
            <div class="px-4 ">
                @if (isset($behaviors_values[3])) {{ $behaviors_values[3] }} @else No answer @endif
            </div>
        </div>

    </div>

    <x-slot name="footer"></x-slot>

</x-admin-behavior-layout>
