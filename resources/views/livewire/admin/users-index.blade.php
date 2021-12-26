
<div class="my-5">
    <x-dashboard.stats />
</div>
<div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 justify-content-between d-flex">
    <h3 class="text-lg">{{ __('Participants') }}</h3>
</div>

<div class="table-responsive">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Id</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Name</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Lastname
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Pets</th>
                <th class="text-secondary opacity-7"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $user->id }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class=" text-xs font-weight-bold text-capitalize">{{ $user->name }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class=" text-xs font-weight-bold">{{ $user->lastname }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class=" text-xs font-weight-bold">{{ $user->email }}</span>
                    </td>
                    <td class="align-middle text-center">
                        @foreach ($user->pets as $pet)
                            <a href="{{ route('admin.pet-profile', $pet) }}"
                                class="badge bg-primary">{{ $pet->name }}</a>
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
