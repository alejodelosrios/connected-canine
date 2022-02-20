<div x-data="{showModal: @entangle('showModal')}">
    <x-card>

        <h4>Medication</h4>

        <div class="p-0 mx-3 mt-3 card-header position-relative z-index-1 justify-content-end d-flex">
            <x-jet-button type="button" @click="showModal = true">
                <span class="mx-1 btn-inner--text ">Add medication</span>
                <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
            </x-jet-button>
        </div>

        <div class="table-responsive">
            <table class="table mb-0 align-items-center">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Frequency
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Time block</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Purpose
                        </th>
                        <th class="text-end text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($medications as $medication)
                        <tr>
                            <td class="text-center">
                                <p class="mb-0 text-xs font-weight-bold text-capitalize">{{ $medication->id }}</p>
                            </td>
                            <td class="text-sm align-middle">
                                <p class="mb-0 text-xs font-weight-bold text-capitalize">{{ $medication->name }}</p>
                            </td>
                            <td class="text-sm align-middle">
                                <span
                                    class="text-xs font-weight-bold text-capitalize">{{ $medication->frequency }}</span>
                            </td>
                            <td class="text-sm text-center align-middle">
                                <span
                                    class="text-xs font-weight-bold text-capitalize">{{ $medication->time_block }}</span>
                            </td>
                            <td class="text-sm text-center align-middle">
                                <span
                                    class="text-xs font-weight-bold text-capitalize">{{ $medication->purpose }}</span>
                            </td>
                            <td class="align-middle text-end">
                                <a wire:click="edit({{ $medication->id }})" style="cursor:pointer"
                                    class="text-xs text-secondary font-weight-bold pe-3" data-toggle="tooltip"
                                    data-original-title="Edit medication" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Edit medication" data-container="body"
                                    data-animation="true">
                                    Edit
                                </a>
                                <a wire:click="delete({{ $medication->id }})"
                                    class="text-xs text-secondary font-weight-bold pe-3" style="cursor:pointer"
                                    data-toggle="tooltip" data-original-title="Delete medication"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete medication"
                                    data-container="body" data-animation="true">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5" class="p-4">
                            {{ __('You have no medications for this pet') }}
                        </td>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-end">
                {{ $medications->links() }}
            </div>
        </div>

        <x-jet-dialog-modal wire:model="showModal">
            <x-slot name="title">
                <h4>Medication Form</h4>
            </x-slot>
            <x-slot name="content">
                <form role="form text-left">
                    <div class="row">
                        {{-- Name --}}
                        <div class="mb-3">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                                wire:model="state.name" autocomplete="name" />
                            <x-jet-input-error for="name" />
                        </div>

                        {{-- Status --}}
                        <div class="mb-3 col-12 col-md-6">
                            <x-jet-label for="status" value="{{ __('Status') }}" />
                            <div class="form-group">
                                <select id="status" type="select"
                                    class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                    wire:model="state.status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        {{-- Frequency --}}
                        <div class="mb-3 col-12 col-md-6">
                            <x-jet-label for="frequency" value="{{ __('Frequency') }}" />
                            <div class="form-group">
                                <select class="form-control {{ $errors->has('frequency') ? 'is-invalid' : '' }}"
                                    id="frequency" wire:model="state.frequency">
                                    <option value="hourly">Hourly</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                        </div>

                        {{-- Medication time blocks --}}
                        <div class="mb-3 col-12 col-md-6">
                            <x-jet-label for="time_block" value="{{ __('Select medication time blocks') }}" />
                            <div class="form-group">
                                <select class="form-control {{ $errors->has('time_block') ? 'is-invalid' : '' }}"
                                    id="time_block" wire:model="state.time_block">
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                    <option value="evening">Evening</option>
                                </select>
                            </div>
                        </div>

                        {{-- Prescription --}}
                        <div class="mb-3 col-12 col-md-6">
                            <x-jet-label for="prescription" value="{{ __('Prescription') }}" />
                            <div class="form-group">
                                <select class="form-control {{ $errors->has('prescription') ? 'is-invalid' : '' }}"
                                    id="prescription" wire:model="state.prescription">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        {{-- Purpose --}}
                        <div class="mb-3 col-12">
                            <x-jet-label for="purpose" value="{{ __('Purpose') }}" />
                            <textarea wire:model="state.purpose" name="purpose" id="purpose"
                                class="form-control  {{ $errors->has('purpose') ? 'is-invalid' : '' }}"></textarea>
                            <x-jet-input-error for="purpose" />
                        </div>
                    </div>
                </form>
            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click="cancel" class="btn btn-secondary me-2">
                    {{ __('Cancel') }}
                </x-jet-button>
                <x-jet-button wire:click="save">
                    <div wire:loading class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

    </x-card>
</div>
