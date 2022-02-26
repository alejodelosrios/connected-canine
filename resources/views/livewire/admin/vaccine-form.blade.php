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
                <x-vaccines-input vaccine="dhhp" :value="$state['dhhp'] ?? ''">DHHP <br>(distemper, hepatitis,
                    parainflienza
                    and parvovirus)
                </x-vaccines-input>
            </div>
        </div>


        @isset($state['proof_file'])
            <div class="gap-2 d-flex align-items-center">
                <div class="p-2 border rounded flex-fill">
                    @if ($pet->vaccines->proof)

                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                <path  fill="currentColor"
                                    d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.21 0-4 1.791-4 4s1.79 4 4 4c2.209 0 4-1.791 4-4s-1.791-4-4-4zm-.004 3.999c-.564.564-1.479.564-2.044 0s-.565-1.48 0-2.044c.564-.564 1.479-.564 2.044 0s.565 1.479 0 2.044z" />
                            </svg>
                            <a class="ms-3" href="{{ route('vaccine-proof', $pet) }}" target="_blank">See document</a>
                        </div>
                    @else
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12.37 5.379l-5.64 5.64c-.655.655-1.515.982-2.374.982-1.855 0-3.356-1.498-3.356-3.356 0-.86.327-1.721.981-2.375l5.54-5.539c.487-.487 1.125-.731 1.765-.731 2.206 0 3.338 2.686 1.765 4.259l-4.919 4.919c-.634.634-1.665.634-2.298 0-.634-.633-.634-1.664 0-2.298l3.97-3.97.828.828-3.97 3.97c-.178.177-.178.465 0 .642.177.178.465.178.642 0l4.919-4.918c1.239-1.243-.636-3.112-1.873-1.874l-5.54 5.54c-.853.853-.853 2.24 0 3.094.854.852 2.24.852 3.093 0l5.64-5.64.827.827zm.637-5.379c.409.609.635 1.17.729 2h7.264v11.543c0 4.107-6 2.457-6 2.457s1.518 6-2.638 6h-7.362v-8.062c-.63.075-1 .13-2-.133v10.195h10.189c3.163 0 9.811-7.223 9.811-9.614v-14.386h-9.993zm4.993 6h-3.423l-.793.793-.207.207h4.423v-1zm0 3h-6.423l-1 1h7.423v-1zm0 3h-9.423l-.433.433c-.212.213-.449.395-.689.567h10.545v-1z" />
                            </svg>
                            <span class="ms-3">File loaded<span>
                        </div>
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

    </form>
</div>
