<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        "name",
        "status",
        "frequency",
        "time_block",
        "purpose",
        "prescription",
        "dosage",
        "instructions",
    ];
    use HasFactory;

    public function pet()
    {
        return $this->belongsTo(\App\Models\Pet::class, "pet_id");
    }
}
