<?php

namespace App\Models;

use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Veterinarian;

class Pet extends Model
{
    use HasFactory;
    use HasProfilePhoto;

    protected $fillable = [
        "user_id",
        "name",
        "birthday",
        "sex",
        "weight",
        "color",
    ];

    protected $casts = [
        "birthday" => "datetime:Y-m-d",
    ];

    public function owner()
    {
        return $this->belongsTo(\App\Models\User::class, "user_id");
    }
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class, "veterinarian_id");
    }
}
