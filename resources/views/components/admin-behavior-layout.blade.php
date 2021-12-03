<x-app-layout>
    <x-card>
        <div class="py-2">

            <div class="justify-content-between d-flex">
                <h4>{{ $title }}</h4>
                <div class="ml-auto">
                    <a href="{{ route('admin.pet-profile', $pet) }}" class="btn btn-primary">Volver</a>
                </div>
            </div>

            <div class="py-2 d-flex flex-column flex-md-row">
                <a href="{{ route('admin.behavior.background', $pet) }}"
                    class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/pets/*/behaviors/background')) active @endif">Behavioral Background</a>

                <a href="{{ route('admin.boarding-history', $pet) }}"
                    class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/pets/*/behaviors/boarding-history')) active @endif">Doggie Daycare History</a>

                <a href="{{ route('admin.behavior.separation-confinement', $pet) }}"
                    class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/pets/*/behaviors/separation-confinement')) active @endif">Separation and Confinement</a>

                <a href="{{ route('admin.behavior.aggression-fear', $pet) }}"
                    class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/pets/*/behaviors/aggression-fear')) active @endif">Aggression and Fear</a>
            </div>
        </div>

        {{ $slot }}


        {{ $footer }}

    </x-card>
</x-app-layout>
