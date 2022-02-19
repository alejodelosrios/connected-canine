<div>
    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 justify-content-between d-flex">
        <h3 class="text-lg">{{ __('Reservations') }}</h3>
    </div>
    <x-reservations-wrap />

    @if (request()->is('admin/old-reservations'))
        <x-reservations-table :reservations="$oldReservations" />
    @else
        <x-reservations-table :reservations="$newReservations" />
    @endif
</div>
