<x-app-layout>
    <x-card>
        <x-pet-details-wrap :pet="$pet" title="Vet & Medical" />

        <h5>Veterinarian Information</h5>
        <hr>
        <div class="p-4">
            @isset($pet->veterinarian)
                <!-- Vet clinic -->
                <div class="mb-3">
                    <x-jet-label for="vet_clinic" value="{{ __('Vet clinic') }}" />
                    <p>{{ $pet->veterinarian->vet_clinic }}</p>
                </div>
                <div class="row">
                    <!-- Vet address -->
                    <div class="mb-3 col-12 col-md-6">
                        <x-jet-label for="vet_address" value="{{ __('Address') }}" />
                        <p>{{ $pet->veterinarian->vet_address }}</p>
                    </div>
                    <!-- Vet phone number -->
                    <div class="mb-3 col-12 col-md-6">
                        <x-jet-label for="vet_phone_number" value="{{ __('Phone number') }}" />
                        <p>{{ $pet->veterinarian->vet_phone_number }}</p>
                    </div>
                </div>
                <div class="row">
                    <!-- Vet city -->
                    <div class="mb-3 col-12 col-md-6">
                        <x-jet-label for="vet_city" value="{{ __('City') }}" />
                        <p>{{ $pet->veterinarian->vet_city }}</p>
                    </div>
                    <!-- Vet zipcode -->
                    <div class="mb-3 col-12 col-md-6">
                        <x-jet-label for="vet_zip_code" value="{{ __('Zipcode') }}" />
                        <p>{{ $pet->veterinarian->vet_zip_code }}</p>
                    </div>
                </div>
            @else
                <div class="my-3">
                    <p>There is not a veterinarian assigned to this pet</p>
                </div>
            @endisset
        </div>

        <h5>Medical Information</h5>
        <hr>
        <div class="d-flex ">
            <h6 class="mx-2">Allergies:</h6>
            <p>{{ $pet->allergies }}</p>
        </div>

        <div class="d-flex ">
            <h6 class="mx-2">Medical conditions:</h6>
            @if (count($pet->medicalConditions()))
                <p>{{ implode(', ', $pet->medicalConditions()) }}</p>
            @else
                <p>This pet hasn't any medical conditions</p>
            @endif
        </div>

        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Frequency
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Time block</th>
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> --}}
                        {{-- Dosage</th> --}}
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> --}}
                        {{-- Instructions</th> --}}
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
                            {{-- <td class="align-middle text-center text-sm"> --}}
                            {{-- <span --}}
                            {{-- class=" text-xs font-weight-bold text-capitalize">{{ $medication->dosage }}</span> --}}
                            {{-- </td> --}}
                            {{-- <td class="align-middle text-center text-sm"> --}}
                            {{-- <span --}}
                            {{-- class=" text-xs font-weight-bold text-capitalize">{{ $medication->instructions }}</span> --}}
                            {{-- </td> --}}
                            <td class="text-end align-middle">
                                <a href="{{ route('admin.pet-medication-details', [$pet, $medication]) }}"
                                    class="text-secondary font-weight-bold text-xs pe-3" data-toggle="tooltip"
                                    data-original-title="Edit medication" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Edit medication" data-container="body"
                                    data-animation="true">
                                    View details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5" class="p-4">
                            {{ __('There are not medications for this pet') }}
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-card>
</x-app-layout>
