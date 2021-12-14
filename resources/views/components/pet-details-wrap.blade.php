<div class="py-2">
    <h4>{{ $title }}</h4>
    <div class="py-2 d-flex flex-column flex-md-row flex-md-wrap">
    @if (request()->is('admin/*'))
        <a href="{{ route('admin.pet-profile', $pet) }}" class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/pets/*/profile')) active @endif">Pet
            Profile</a>
        <a href="{{ route('admin.pet-veterinarian', $pet) }}"
            class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/pets/*/veterinarian')) active @endif">Veterinarian</a>
        <a href="{{ route('admin.pet-vaccines', $pet) }}"
            class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/pets/*/vaccines')) active @endif">Vaccines</a>
        <a href="{{ route('admin.behavior.background', $pet) }}" class="mx-1 btn btn-primary btn-sm">Behavior</a>
        <a href="{{ route('admin.pet-medications', $pet) }}"
            class="mx-1 btn btn-primary btn-sm @if (request()->is('admin/pets/*/medications') || request()->is('admin/pets/*/medications/*/details')) active @endif">Medical</a>
    @else
        <a href="{{ route('pet.update', $pet) }}" class="mx-1 btn btn-primary btn-sm @if (request()->is('pets/*/profile')) active @endif">Pet
            Profile</a>
        <a href="{{ route('veterinarian', $pet) }}"
            class="mx-1 btn btn-primary btn-sm @if (request()->is('pet/*/veterinarian')) active @endif">Veterinarian</a>
        <a href="{{ route('vaccines', $pet) }}"
            class="mx-1 btn btn-primary btn-sm @if (request()->is('pets/*/vaccines')) active @endif">Vaccines</a>
        <a href="{{ route('pet.behavior.backgroung', $pet) }}" class="mx-1 btn btn-primary btn-sm">Behavior</a>
        <a href="{{ route('pet.medications', $pet) }}"
            class="mx-1 btn btn-primary btn-sm @if (request()->is('pets/*/medications')|| request()->is('pets/*/medications/add')|| request()->is('pets/*/medications/*/update')) active @endif">Medical</a>
    @endif
    </div>
</div>
