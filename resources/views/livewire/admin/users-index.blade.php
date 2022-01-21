<div>

    @role('Admin')
        <div class="my-5">
            <x-dashboard.stats />
        </div>
    @endrole
    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 justify-content-between d-flex">
        <h3 class="text-lg">{{ __('Participants') }}</h3>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th
                        class="d-none d-md-table-cell text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Id</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Role
                    </th>
                    <th
                        class="d-none d-md-table-cell text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Pets</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="d-none d-md-table-cell align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $user->id }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            @role('Admin')
                                <a href="{{ route('admin.user-profile', $user) }}"
                                    class="text-xs font-weight-bold text-capitalize">{{ $user->fullName }}</a>
                            @else
                                <p class="text-xs font-weight-bold text-capitalize">{{ $user->fullName }}</p>
                            @endrole
                        </td>
                        <td class="align-middle text-center">
                            <span class=" text-xs font-weight-bold">{{ $user->roleName }}</span>
                        </td>
                        <td class="d-none d-md-table-cell align-middle text-center">
                            <span class=" text-xs font-weight-bold">{{ $user->email }}</span>
                        </td>
                        <td class="align-middle text-center">
                            @foreach ($user->pets as $pet)
                                @role('Admin')
                                    <a href="{{ route('admin.pet-profile', $pet) }}"
                                        class="badge bg-primary">{{ $pet->name }}</a>
                                @else
                                    <p class="badge bg-primary">{{ $pet->name }}</p>
                                @endrole
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <td colspan="5" class="p-4">
                        {{ __('There are not users') }}
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
