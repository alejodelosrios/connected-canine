<x-app-layout>
    <x-card>
        <x-pet-details-wrap :pet="$pet" title="Pet Profile" />
        <div>
            <div class="mb-3">
                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                {{-- Current Profile Photo --}}

                <div class="mt-2">
                    @if ($pet->profile_photo_path)
                        <img src="{{ $pet->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                    @endif
                </div>
            </div>
            <div class="row">
                {{-- Name --}}
                <div class="mb-3">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <p>
                        {{ $pet->name }}
                    </p>
                </div>

                {{-- Birthday --}}
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="birthday" value="{{ __('Birthday') }}" />
                    <p>
                        {{ $pet->birthday }}
                    </p>
                </div>

                {{-- Sex --}}
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="sex" value="{{ __('Sex') }}" />
                    <p>
                        {{ $pet->sex }}
                    </p>
                </div>

                {{-- Weight --}}
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="weight" value="{{ __('Weight (lbs)') }}" />
                    <p>
                        {{ $pet->weight }}
                    </p>
                </div>

                {{-- Color --}}
                <div class="mb-3 col-12 col-md-6">
                    <x-jet-label for="color" value="{{ __('Color') }}" />
                    <p>
                        {{ $pet->color }}
                    </p>
                </div>
            </div>

        </div>
    </x-card>
</x-app-layout>
