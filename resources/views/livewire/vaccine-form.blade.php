<div class="row">

    <x-jet-action-message on="saved">
        {{ __('Saved.') }}
    </x-jet-action-message>
    <form wire:submit.prevent="save" role="form text-left" class="mx-auto col-md-10">
        <div class="mb-4 row rows-col-1 rows-col-lg-3">
            <div class="rounded col">
                <x-vaccines-input vaccine="rabies"><br>Rabies<br><br></x-vaccines-input>
            </div>
            <div class="rounded col">
                <x-vaccines-input vaccine="bordetella"><br>Bordetella<br><br></x-vaccines-input>
            </div>
            <div class="rounded col">
                <x-vaccines-input vaccine="dhhp">DHHP <br>(distemper, hepatitis, parainflienza and parvovirus)
                </x-vaccines-input>
            </div>
        </div>

        @isset($state['proof'])
            <div class="border rounded p-2 ">
                <a href="#">{{ $state['proof'] }}</a>
            </div>
        @else
            <div class=" mt-4 mb-2">
                <input wire:model="state.proof" class="form-control form-control-lg" id="vaccine_proof" type="file">
                @error('proof') <span class="error">{{ $message }}</span> @enderror
            </div>
        @endisset

        <p class="text-sm px-2">
            Dogs are required to have up-to-date vaccines to visit your office. Please upload the records or email them
            to ibfo@connectedcanine.com
        </p>

        <button type="submit">Salvar</button>
    </form>
</div>
