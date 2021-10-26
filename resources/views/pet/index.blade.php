<x-app-layout>
    <div class="card">
        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 justify-content-between d-flex">

            <h3 class="text-lg">Pets list</h3>

            <a href="{{ route('pet.create') }}" class="btn btn-icon btn-3 btn-primary " type="button">
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
                                        <img src="https://images.pexels.com/photos/2023384/pexels-photo-2023384.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                            class="avatar avatar-sm me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $pet->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $pet->color }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold text-capitalize">{{ $pet->sex }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-bold">{{ $pet->birthday->format('m-d-Y') }}</span>
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
                        <td colspan="5">No register</td>
                    @endforelse ($pets as $pet)
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
