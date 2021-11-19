<x-admin-behavior-layout :data="$data">

    {{-- Question 01 --}}
    <h5 class="mt-2 text-sm">
        1) How relaxed or stressed is your dog with familiar people do the following
    </h5>
    <ul class="p-2 md:px-4 ">
        @for ($i = 0; $i < 5; $i++)
            <li class="d-flex">
                <h6 class="mx-2 text-sm">{{ data_get($questions, $i . '.name') }}:</h6>
                <div class="mx-2">
                    @isset($behaviors_values[$i + 1])
                        {{ $behaviors_values[$i + 1] }}
                    @else
                        No answer
                    @endisset
                </div>
            </li>
        @endfor
    </ul>

    {{-- Question 02 --}}
    <h6 class="mt-5 text-sm">
        2) How relaxed or stressed is your dog when unfamiliar people approach and your dog...
    </h6>
    <ul class="p-2 md:px-4 ">
        @for ($i = 5; $i < 9; $i++)
            <li class="d-flex">
                <h6 class="mx-2 text-sm">{{ data_get($questions, $i . '.name') }}:</h6>
                <div class="mx-2">
                    @isset($behaviors_values[$i + 1])
                        {{ $behaviors_values[$i + 1] }}
                    @else
                        No answer
                    @endisset
                </div>
            </li>
        @endfor
    </ul>

    {{-- Question 03 --}}
    <h6 class="mt-5 text-sm">
        3) How relaxed or stressed is your dog when an unfamiliar person is a...
    </h6>
    <ul class="p-2 md:px-4 ">
        @for ($i = 9; $i < 12; $i++)
            <li class="d-flex">
                <h6 class="mx-2 text-sm">{{ data_get($questions, $i . '.name') }}:</h6>
                <div class="mx-2">
                    @isset($behaviors_values[$i + 1])
                        {{ $behaviors_values[$i + 1] }}
                    @else
                        No answer
                    @endisset
                </div>
            </li>
        @endfor
    </ul>

    {{-- Question 04 --}}
    <h6 class="mt-5 text-sm ">
        4) How relaxed or stressed is your dog when unfamiliar dogs...
    </h6>
    <ul class="p-2 md:px-4 ">
        @for ($i = 12; $i < 17; $i++)
            <li class="d-flex">
                <h6 class="mx-2 text-sm">{{ data_get($questions, $i . '.name') }}:</h6>
                <div class="mx-2">
                    @isset($behaviors_values[$i + 1])
                        {{ $behaviors_values[$i + 1] }}
                    @else
                        No answer
                    @endisset
                </div>
            </li>
        @endfor
    </ul>


    {{-- Question 05 --}}
    <h6 class="mt-5 text-sm">
        5) How relaxed or stressed is your dog when unfamiliar dogs approach and your dog ...
    </h6>
    <ul class="p-2 md:px-4">
        @for ($i = 17; $i < 21; $i++)
            <li class="d-flex">
                <h6 class="mx-2 text-sm">{{ data_get($questions, $i . '.name') }}:</h6>
                <div class="mx-2">
                    @isset($behaviors_values[$i + 1])
                        {{ $behaviors_values[$i + 1] }}
                    @else
                        No answer
                    @endisset
                </div>
            </li>
        @endfor
    </ul>

    {{-- Question 06 --}}
    <div class="mt-5">
        <h6 class="text-sm">
            6) {{ data_get($questions, '21.name') }}
        </h6>

        <div class="px-0 px-md-4">
            <div class="row">
                @isset($behaviors_values[22]['values'])
                    @foreach ($behaviors_values[22]['values'] as $behaviors)
                        <div class="p-1 col-6 col-md-3 h-100">
                            <x-dog-option :value="$behaviors" key="question1_option{{ $loop->index }}"
                                image="{{ \Illuminate\Support\Str::of($behaviors)->kebab() }}" readonly="true" />
                        </div>
                    @endforeach
                @else
                    <div class="p-1 h-100">No answer</div>
                @endisset
            </div>

            <div class="my-2">
                <label class="pb-1 flex-column col-12 col-md-6 h-100 d-flex flex-md-row">
                    <span class="py-2 pe-2">{{ __('Other') }}</span>

                    <div class="p-2 border rounded flex-fill">
                        @isset($behaviors_values[22]['comments'])
                            {{ $behaviors_values[22]['comments'] }}
                        @else
                            No comments
                        @endisset
                    </div>
                </label>
            </div>
        </div>
    </div>

    {{-- Question 07 --}}
    <div class="mt-5">
        <h6 class="text-sm">
            7) {{ data_get($questions, '22.name') }}
        </h6>

        <div class="px-0 px-md-4">
            <div class="row">
                @isset($behaviors_values[23]['values'])
                    @foreach ($behaviors_values[23]['values'] as $behaviors)
                        <div class="p-1 col-6 col-md-3 h-100">
                            <x-dog-option :value="$behaviors" key="question1_option{{ $loop->index }}"
                                image="{{ \Illuminate\Support\Str::of($behaviors)->kebab() }}" readonly="true" />
                        </div>
                    @endforeach
                @else
                    <div class="p-1 h-100">No answer</div>
                @endisset
            </div>

            <div class="my-2">
                <label class="pb-1 flex-column col-12 col-md-6 h-100 d-flex flex-md-row">
                    <span class="py-2 pe-2">{{ __('Other') }}</span>

                    <div class="p-2 border rounded flex-fill">
                        @isset($behaviors_values[23]['comments'])
                            {{ $behaviors_values[23]['comments'] }}
                        @else
                            No comments
                        @endisset
                    </div>
                </label>
            </div>
        </div>
    </div>


    {{-- Question 08 --}}
    <div class="mt-5">
        <h6 class="text-sm">
            8) {{ data_get($questions, '23.name') }}
        </h6>
        <div class="p-2 border rounded flex-fill">
            @isset($behaviors_values[24])
                {{ $behaviors_values[24] }}
            @else
                No comments
            @endisset
        </div>
    </div>

    {{-- Question 09 --}}
    <div class="mt-5">
        <h6 class="text-sm">
            9) {{ data_get($questions, '24.name') }}
        </h6>
        <div class="p-2 border rounded flex-fill">
            @isset($behaviors_values[25])
                {{ $behaviors_values[25] }}
            @else
                No comments
            @endisset
        </div>
    </div>

    <x-slot name="footer"></x-slot>

</x-admin-behavior-layout>
