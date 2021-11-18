<x-admin-behavior-layout  :pet="$pet">
    <x-slot name="title">Separation Confinement</x-slot>

    <div>
        <div>

            {{-- Question 01 --}}
            <div class="mt-2">

                <h6 class="text-sm">
                    1) {{ data_get($questions, '0.name') }}
                </h6>

                <div class="px-0 px-md-4">

                    <div class="row">
                        @forelse($behaviors_values[0] as $behaviors)
                            <div class="p-1 col-6 col-md-3 h-100">
                                <x-dog-option :value="$behaviors" key="question1_option{{ $loop->index }}"
                                    image="{{ \Illuminate\Support\Str::of($behaviors)->kebab() }}" readonly="true" />
                            </div>
                        @empty
                            <div class="p-1 h-100">
                                No answer
                            </div>
                        @endforelse
                    </div>

                    <div class="my-2">
                        <label class="pb-1 flex-column col-12 col-md-6 h-100 d-flex flex-md-row" for="question1_option9">
                            <span class="py-2 pe-2">{{ __('Other') }}</span>

                            <div class="p-2 border rounded flex-fill">
                                @isset($behaviors_values[1])
                                    {{ $behaviors_values[1] }}
                                @else
                                    No comments
                                @endisset
                            </div>
                        </label>
                    </div>

                </div>
            </div>

            {{-- Question 02 --}}
            <div class="mt-5">
                <h6 class="mb-3 text-sm">
                    2) {{ data_get($questions, '1.name') }}
                </h6>

                <div class="px-2 md:px-4">
                    @isset($behaviors_values[2])
                        {{ $behaviors_values[2] }}
                    @else
                        No answer
                    @endisset
                </div>


                <div class="px-2 my-2 md:px-4">

                    <label for="question2_option4" class="my-2">
                        {{ __('If you selected "Ocassionally", what are de circumstances surrounding times when your acts distressed?') }}
                    </label>

                    <div class="form-control {{ $errors->has('question2.comments') ? 'is-invalid' : '' }}">
                        @if ($behaviors_values[2] === 'Occasionally')
                            {{ $behaviors_values[3] }}
                        @else
                            No answer
                        @endisset
                </div>
            </div>

        </div>
    </div>

    <x-slot name="footer"></x-slot>

</x-admin-behavior-layout>
