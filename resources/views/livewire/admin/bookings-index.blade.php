<div>
    <div class="p-0 mt-3 card-header z-index-1">
        <div class="d-flex justify-content-between w-100">
            <h4>{{ __('Reservations') }}</h4>
        </div>
    </div>
    <x-reservations-wrap />

    @if (request()->is('admin/old-reservations'))
        <x-reservations-table :reservations="$oldReservations" />
    @else
        <x-reservations-table :reservations="$newReservations" />
    @endif
</div>
