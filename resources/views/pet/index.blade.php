<x-app-layout>
    <div class="card">
        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 justify-content-between d-flex">

            <h3 class="text-lg">Pets</h3>

            <a href="{{ route('pet.create') }}" class="btn btn-icon btn-3 btn-primary ">
                <span class="btn-inner--text mx-1 ">Add pet</span>
                <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Color
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Sex</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Birthday</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pets as $pet)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        @if ($pet->profile_photo_path)
                                            <img src="{{ $pet->profile_photo_url }}" class="avatar avatar-sm me-3">
                                        @else
                                            <img src="{{ asset("img/pets.png")}}" class="avatar avatar-sm me-3">
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <a href="{{ route('pet.update', $pet) }}"
                                            class="mb-0 text-xs font-weight-bold">{{ $pet->name }}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $pet->color }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class=" text-xs font-weight-bold text-capitalize">{{ $pet->sex }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class=" text-xs font-weight-bold">{{ $pet->birthday->format('m-d-Y') }}</span>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('pet.update', $pet->id) }}"
                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                    data-original-title="Edit user" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit pet profile" data-container="body" data-animation="true">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5" class="p-4">
                            {{ __('You have no registered pets') }}
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
