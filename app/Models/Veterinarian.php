<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pet;

class Veterinarian extends Model
{
    use HasFactory;

    protected $fillable = ["vet_clinic", "vet_address", "vet_phone_number"];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
