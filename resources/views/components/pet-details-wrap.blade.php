@props([
    'title'=> 'Non Title'
])
<div class="py-2">
    <h4>{{ $title }}</h4>
    <div class="py-2 d-flex flex-column flex-md-row">
        <a href="{{ route("pet.update", $pet)}}" class="mx-1 btn btn-primary btn-sm @if(request()->is('pets/*/profile')) active @endif">Pet Profile</a>
        <a href="{{ route("veterinarian", $pet)}}" class="mx-1 btn btn-primary btn-sm @if(request()->is('pet/*/veterinarian')) active @endif">Veterinarian</a>
        <a href="#" class="mx-1 btn btn-primary btn-sm @if(request()->is('#/*') || request()->is('#')) active @endif">Vaccines</a>
        <a href="#" class="mx-1 btn btn-primary btn-sm @if(request()->is('#/*') || request()->is('#')) active @endif">Health adn Behavior</a>
        <a href="#" class="mx-1 btn btn-primary btn-sm @if(request()->is('v#/*') || request()->is('#')) active @endif">Medical Details</a>
    </div>
</div>
