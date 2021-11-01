<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    public function pets()
    {
        return $this->belongsToMany(\App\Models\Pet::class);
    }
}
