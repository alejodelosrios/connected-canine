<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Insurance') }}
    </x-slot>

    <x-slot name="description">
        All employees who bring their pet into the office are required to
        maintain liability coverage of at least $100k that covers them in case their pet is involved in an
        incident. Often homeowners and renters policies already include this coverage.
    </x-slot>

    <x-slot name="no_card_body">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        {{--<div class="w-100">--}}
            {{--@isset($state['proof_file'])--}}
                {{--<div class="gap-2 d-flex align-items-center">--}}
                    {{--<div class="p-2 border rounded flex-fill">--}}
                        {{--<a href="{{ route('insurance-proof', $user) }}" target="_blank">See document</a>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<x-jet-button class="mt-3" type="button" wire:click="removeProof">Remove file--}}
                        {{--</x-jet-button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@else--}}
                {{--<div class="mt-4 mb-2 ">--}}
                    {{--<input wire:model="state.proof"--}}
                        {{--class="form-control form-control-lg {{ $errors->has('proof') ? 'is-invalid' : '' }}"--}}
                        {{--id="insurance_proof" type="file">--}}
                    {{--<x-jet-input-error for="proof" />--}}
                {{--</div>--}}
            {{--@endisset--}}

            {{--<p class="px-2 text-sm">--}}
                {{--Required for approval. Please email proof of insurance to info@connectedcanine.com.--}}
            {{--</p>--}}
        {{--</div>--}}
    </x-slot>


</x-jet-form-section>
