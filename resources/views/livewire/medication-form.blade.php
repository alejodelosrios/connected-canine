<div>
    {{--<form wire:submit.prevent="save" role="form text-left">--}}
        {{--<x-jet-action-message on="saved">--}}
            {{--{{ __('Saved.') }}--}}
        {{--</x-jet-action-message>--}}

        {{--<div class="row">--}}
            {{--[> Name <]--}}
            {{--<div class="mb-3">--}}
                {{--<x-jet-label for="name" value="{{ __('Name') }}" />--}}
                {{--<x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"--}}
                    {{--wire:model.defer="state.name" autocomplete="name" />--}}
                {{--<x-jet-input-error for="name" />--}}
            {{--</div>--}}

            {{--[> Birthday <]--}}
            {{--<div class="mb-3 col-12 col-md-6">--}}
                {{--<x-jet-label for="birthday" value="{{ __('Birthday') }}" />--}}
                {{--<x-jet-input id="birthday" type="date" class="{{ $errors->has('birthday') ? 'is-invalid' : '' }}"--}}
                    {{--wire:model.defer="state.birthday" />--}}
                {{--<x-jet-input-error for="birthday" />--}}
            {{--</div>--}}

            {{--[> Sex <]--}}
            {{--<div class="mb-3 col-12 col-md-6">--}}
                {{--<x-jet-label for="sex" value="{{ __('Sex') }}" />--}}

                {{--<div class="form-group">--}}
                    {{--<select class="form-control {{ $errors->has('sex') ? 'is-invalid' : '' }}" id="sex"--}}
                        {{--wire:model.defer="state.sex">--}}
                        {{--<option value="female">Female</option>--}}
                        {{--<option value="male">Male</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--[> Weight <]--}}
            {{--<div class="mb-3 col-12 col-md-6">--}}
                {{--<x-jet-label for="weight" value="{{ __('Weight') }}" />--}}
                {{--<x-jet-input id="weight" type="number" class="{{ $errors->has('weight') ? 'is-invalid' : '' }}"--}}
                    {{--wire:model.defer="state.weight" />--}}
                {{--<x-jet-input-error for="weight" />--}}
            {{--</div>--}}

            {{--[> Color <]--}}
            {{--<div class="mb-3 col-12 col-md-6">--}}
                {{--<x-jet-label for="color" value="{{ __('Color') }}" />--}}
                {{--<x-jet-input id="color" class="{{ $errors->has('color') ? 'is-invalid' : '' }}"--}}
                    {{--wire:model.defer="state.color" />--}}
                {{--<x-jet-input-error for="color" />--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</form>--}}
</div>
