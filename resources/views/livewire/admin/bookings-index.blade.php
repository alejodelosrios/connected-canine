<div>
    <div class="p-0 mt-3 card-header z-index-1">
        <div class="d-flex justify-content-between w-100">
            <h4>{{ __('Reservations') }}</h4>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <x-reservations-wrap />

        <button wire:click="exporIntoExcel"
            class="text-center btn btn-primary shadow icon-sm icon icon-shape border-radius-md me-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/xls-white.png') }}" width="20px" height="20px" alt="excel icon">
        </button>
    </div>
    <x-reservations-table :reservations="$reservations" />
</div>
