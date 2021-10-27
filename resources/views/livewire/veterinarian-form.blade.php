<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Veterinarian Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>


        <div class="w-100">
            <!-- Search clinic -->
            <x-jet-label for="search_clinic" value="{{ __('Search clinic') }}" />
            <form class=" mb-4 relative" autocomplete="off">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" wire:model="search" placeholder="Type here to search...">
                </div>
                @if ($search)
                    <ul class="absolute left-0 w-full bg-gray-100 mt-1 list-group">
                        @foreach ($this->vets as $vet)
                            <li class="list-group-item list-group-item-action"
                                wire:click="vet_data({{ $vet }})">{{ $vet->vet_clinic }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>

            {{--@dd($state)--}}
            @if($state !== [])
                <!-- Vet clinic -->
                <div class="mb-3">
                    <x-jet-label for="vet_clinic" value="{{ __('Vet clinic') }}" />
                    <p>{{ $state['vet_clinic'] }}</p>
                </div>
                <div class="row">
                    {{--<!-- Vet email -->--}}
                    {{--<div class="mb-3 col-12 col-md-6">--}}
                        {{--<x-jet-label for="vet_email" value="{{ __('Email') }}" />--}}
                        {{--<p>{{ $state['vet_email'] !== null ? $state["vet_email"] : "" }}</p>--}}
                    {{--</div>--}}
                    <!-- Vet phone number -->
                    <div class="mb-3 col-12 col-md-6">
                        <x-jet-label for="vet_phone_number" value="{{ __('Phone number') }}" />
                        <p>{{ $state['vet_phone_number'] }}</p>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{--<!-- Vet contact 1 -->--}}
                    {{--<div class="mb-3 col-12 col-md-6">--}}
                        {{--<x-jet-label for="vet_contact1" value="{{ __('Contact 1') }}" />--}}
                        {{--<p>{{ $state['vet_contact1'] }}</p>--}}
                    {{--</div>--}}
                    {{--<!-- Vet contact 2 -->--}}
                    {{--<div class="mb-3 col-12 col-md-6">--}}
                        {{--<x-jet-label for="vet_contact2" value="{{ __('Contact 2') }}" />--}}
                        {{--<p>{{ $state['vet_contact2'] }}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Vet address -->--}}
                {{--<div class="mb-3">--}}
                    {{--<x-jet-label for="vet_address" value="{{ __('Address') }}" />--}}
                    {{--<p>{{ $state['vet_address'] }}</p>--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                    {{--<!-- Vet city -->--}}
                    {{--<div class="mb-3 col-12 col-md-6">--}}
                        {{--<x-jet-label for="vet_city" value="{{ __('City') }}" />--}}
                        {{--<p>{{ $state['vet_city'] }}</p>--}}
                    {{--</div>--}}
                    {{--<!-- Vet zipcode -->--}}
                    {{--<div class="mb-3 col-12 col-md-6">--}}
                        {{--<x-jet-label for="vet_zip_code" value="{{ __('Zipcode') }}" />--}}
                        {{--<p>{{ $state['vet_zip_code'] }}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Vet website -->--}}
                {{--<div class="mb-3">--}}
                    {{--<x-jet-label for="vet_website" value="{{ __('Website') }}" />--}}
                    {{--<p>{{ $state['vet_website'] }}</p>--}}
                {{--</div>--}}
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="d-flex align-items-baseline">
            <x-jet-button>
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                {{ __('Save') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>
