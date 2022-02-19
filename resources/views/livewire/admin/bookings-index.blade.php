<div>
    <div class="p-0 mt-3 card-header z-index-1">
        <div class="d-flex justify-content-between w-100">
            <h4>{{ __('Reservations') }}</h4>
        </div>
    </div>
    <x-reservations-wrap />
    <x-reservations-table :reservations="$reservations" />
</div>
