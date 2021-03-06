<div class="table-responsive">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Employee
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Pet
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Date
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations  as $reservation)
                <tr>
                    <td class="align-middle text-center">
                        <span class="text-xs font-weight-bold">{{ $reservation->pet->owner->fullName }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class=" text-xs font-weight-bold">{{ $reservation->pet->name }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class=" text-xs font-weight-bold">{{ $reservation->formattedDate }}</span>
                    </td>
                </tr>

            @empty
                <td colspan="5" class="p-4">
                    {{ __('There are not reservations') }}
                </td>
            @endforelse
        </tbody>
    </table>
    {{ $reservations->links() }}
</div>
