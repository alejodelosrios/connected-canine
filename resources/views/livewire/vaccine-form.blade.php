<div class="row">

    <x-jet-action-message on="saved">
        {{ __('Saved.') }}
    </x-jet-action-message>
    <form wire:submit="save" role="form text-left" class="mx-auto col-md-10">
        <div class="mb-4 row rows-col-1 rows-col-lg-3">
            <div class="rounded col">
                <x-vaccines-input vaccine="rabies" :value="$state['rabies'] ?? ''"><br>Rabies<br><br></x-vaccines-input>
            </div>
            <div class="rounded col">
                <x-vaccines-input vaccine="bordetella" :value="$state['bordetella'] ?? ''"><br>Bordetella<br><br>
                </x-vaccines-input>
            </div>
            <div class="rounded col">
                <x-vaccines-input vaccine="dhhp" :value="$state['dhhp'] ?? ''">DHHP <br>(distemper, hepatitis, parainflienza
                    and parvovirus)
                </x-vaccines-input>
            </div>
        </div>

        @isset($state['proof'])
            <div class="gap-2 d-flex align-items-center">
                <div class="p-2 border rounded flex-fill">
                    <a href="{{ route('vaccine-proof',$pet) }}">See document</a>
                </div>
                <div>
                    <x-jet-button class="mt-3" type="button" wire:click="removeProof">Remove file</x-jet-button>
                </div>
            </div>
        @else
            <div class="mt-4 mb-2 ">
                <input wire:model="state.proof"
                    class="form-control form-control-lg {{ $errors->has('proof') ? 'is-invalid' : '' }}"
                    id="vaccine_proof" type="file">
                <x-jet-input-error for="proof" />
            </div>
        @endisset

        <p class="px-2 text-sm">
            Dogs are required to have up-to-date vaccines to visit your office. Please upload the records or email them
            to ibfo@connectedcanine.com
        </p>

    </form>
</div>
