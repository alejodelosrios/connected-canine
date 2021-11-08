<x-app-layout>
    <x-card>
        <x-pet-details-wrap :pet="$pet" />
        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 justify-content-between d-flex">

            <h3 class="text-lg">Medications</h3>

            <a href="{{ route('pet.medication-create', $pet) }}" class="btn btn-icon btn-3 btn-primary ">
                <span class="btn-inner--text mx-1 ">Add medication</span>
                <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Frequency
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Time block</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Dosage</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Instructions</th>
                        <th class="text-end text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pet->medications as $medication)
                        <tr>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $medication->id }}</p>
                            </td>
                            <td class="align-middle text-sm">
                                <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $medication->name }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span
                                    class=" text-xs font-weight-bold text-capitalize">{{ $medication->frequency }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span
                                    class=" text-xs font-weight-bold text-capitalize">{{ $medication->time_block }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span
                                    class=" text-xs font-weight-bold text-capitalize">{{ $medication->dosage }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span
                                    class=" text-xs font-weight-bold text-capitalize">{{ $medication->instructions }}</span>
                            </td>
                            <td class="text-end align-middle">
                                <a href="{{ route('pet.medication-update', [$pet, $medication]) }}"
                                    class="text-secondary font-weight-bold text-xs pe-3" data-toggle="tooltip"
                                    data-original-title="Edit medication" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit medication" data-container="body" data-animation="true">
                                    Edit
                                </a>
                                <a href="{{ route('pet.medication-delete', [$pet, $medication]) }}"
                                    class="text-secondary font-weight-bold text-xs pe-3" data-toggle="tooltip"
                                    data-original-title="Delete medication" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Delete medication" data-container="body" data-animation="true">
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
        </div>
    </x-card>
</x-app-layout>
