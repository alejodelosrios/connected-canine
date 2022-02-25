<div class="row">

    <x-jet-action-message on="saved">
        {{ __('Saved.') }}
    </x-jet-action-message>
    <form wire:submit="save" role="form text-left" class="mx-auto col-md-10">

        <p class="px-2 text-sm">
            All dogs are required to be current on the following vaccinations:
        </p>
        <ul class="px-2 text-sm">
            <li>Rabies</li>
            <li>Bordetella</li>
            <li>DHHP (distemper, hepatitis, parainfluenza, and parvovirus)</li>
        </ul>
        <p class="px-2 text-sm">
            Please upload vaccination records from your veterinarian's office, rescue group, or breeder.
        </p>

        @isset($state['proof'])
            <div class="gap-2 d-flex align-items-center">
                <div class="p-2 border rounded flex-fill">
                    @if ($pet->vaccines)
                        <a href="{{env("AWS_URL") . $pet->vaccines->proof}}" target="_blank">See document</a>
                    @endif
                </div>
                <div>
                    <x-jet-button class="mt-3" type="button" wire:click="removeProof">Remove file</x-jet-button>
                </div>
            </div>
        @else
            <div class="mt-4 mb-2 ">
                <input wire:model.defer="state.proof"
                    class="form-control form-control-lg {{ $errors->has('proof') ? 'is-invalid' : '' }}"
                    id="vaccine_proof" type="file">
                <x-jet-input-error for="proof" />
            </div>
        @endisset

        <p class="px-2 text-sm">We can help by requesting veterinary records on your behalf if you e-mail us At
            info@connectedcanine.com.</p>

    </form>
</div>
