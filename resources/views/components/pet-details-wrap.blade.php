@props([
    'title'=> 'Non Title'
])
<div class="py-2">
    <h4>{{ $title }}</h4>
    <div class="py-2 d-flex flex-column flex-md-row">
        <a href="{{ route("pet.update", $pet)}}" class="mx-1 btn btn-primary btn-sm @if(request()->is('pets/*/profile')) active @endif">Pet Profile</a>
        <a href="{{ route("veterinarian", $pet)}}" class="mx-1 btn btn-primary btn-sm @if(request()->is('pet/*/veterinarian')) active @endif">Veterinarian</a>
        <a href="{{ route('vaccines',$pet) }}" class="mx-1 btn btn-primary btn-sm @if(request()->is('pets/*/vaccines')) active @endif">Vaccines</a>
        <a href="{{ route('pet.behavior.backgroung',$pet) }}" class="mx-1 btn btn-primary btn-sm">Health adn Behavior</a>
        <a href="{{ route("pet.medications", $pet)}}" class="mx-1 btn btn-primary btn-sm @if(request()->is('pets/*/medications') || request()->is('/pets/*/medications/*/update')) active @endif">Medications</a>
    </div>
</div>
