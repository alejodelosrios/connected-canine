<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medication extends Model
{
    protected $fillable = [
        "name",
        "status",
        "frequency",
        "time_block",
        "purpose",
        "prescription",
    ];
    use HasFactory;

    public function pet()
    {
        return $this->belongsTo(\App\Models\Pet::class, "pet_id");
    }
}
