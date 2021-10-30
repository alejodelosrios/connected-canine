<div class="py-2">
    <h3>Pet Details</h3>
    <div class="d-flex flex-column flex-md-row py-2">
        <a href="{{ route("pet.update", $pet)}}" class="btn btn-info btn-sm mx-1">Pet Profile</a>
        <a href="{{ route("veterinarian", $pet)}}" class="btn btn-info btn-sm mx-1">Veterinarian</a>
        <a href="#" class="btn btn-info btn-sm mx-1">Vaccines</a>
        <a href="#" class="btn btn-info btn-sm mx-1">Health adn Behavior</a>
        <a href="#" class="btn btn-info btn-sm mx-1">Medical Details</a>
    </div>
</div>
