<div class="py-2" x-data="{active: @entangle('active')}">
    <div class="py-2 d-flex flex-column flex-md-row flex-md-wrap">
        <span @click="active = 1" :class="active==1 ? 'active' :''" class="mx-1 btn btn-primary btn-sm">
            New reservations
        </span>
        <span @click="active = 2 ":class="active==2 ? 'active' :''"
            class="mx-1 btn btn-primary btn-sm">
            Old reservations
        </span>
    </div>
</div>
