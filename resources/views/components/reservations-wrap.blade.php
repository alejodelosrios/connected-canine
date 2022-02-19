<div class="py-2">
    <div class="py-2 d-flex flex-column flex-md-row flex-md-wrap">
        <a href="{{ route('admin.old-bookings-index') }}" class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/old-reservations')) active @endif">
            Old reservations
        </a>
        <a href="{{ route('admin.bookings-index') }}"
            class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/reservations')) active @endif">
            New reservations
        </a>
    </div>
</div>
