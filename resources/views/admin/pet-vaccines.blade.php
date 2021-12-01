<x-app-layout>
<x-card>
      <x-pet-details-wrap :pet="$pet" title="Pet Vaccines" />

        <livewire:vaccine-form :pet="$pet" />

        <x-slot name="footer">
            <div class="mx-auto d-flex align-items-baseline justify-content-end col-lg-10 col-12">
                <div>
                    <a href="{{ route('pet.index') }}" class="mx-2 btn btn-secondary">
                        {{ __('Cancel') }}
                    </a>
                </div>
                @livewire('save-button', [
                'redirect_route_name' => route('vaccines',$pet)
                ])
            </div>
        </x-slot>
    </x-card>
</x-app-layout>
