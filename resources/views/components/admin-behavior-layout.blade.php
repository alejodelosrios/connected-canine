<x-app-layout>
    <x-card>
        <div class="py-2">
            <h4>{{ $title }}</h4>

            <div class="py-2 d-flex flex-column flex-md-row">
                <a href="{{ route('admin.behavior.background', $pet) }}"
                    class="mx-1 btn btn-primary btn-sm @if (request()->is('pets/*/behaviors/background')) active @endif">Behavioral Background</a>
                <a href="{{ route('admin.behavior.separation-confinement', $pet) }}"
                    class="mx-1 btn btn-primary btn-sm @if (request()->is('pets/*/behaviors/separation-confinement')) active @endif">Separation and Confinement</a>
                <a href="{{ route('admin.behavior.aggression-fear', $pet) }}"
                    class="mx-1 btn btn-primary btn-sm @if (request()->is('pets/*/behaviors/aggression-fear')) active @endif">Aggression and Fear</a>
            </div>
        </div>

        {{ $slot }}


        {{ $footer }}

    </x-card>
</x-app-layout>
