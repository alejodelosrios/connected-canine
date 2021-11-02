<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Behavior extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'type'
    ];

    public function pets()
    {
        return $this->belongsToMany(\App\Models\Pet::class);
    }

    public function scopeBehavioralBackgroundQuestions($query)
    {
        return $query->where('type', 'background')->get();
    }

    public function scopeSeparationConfinementQuestions($query)
    {
        return $query->where('type', 'separation_confinement')->get();
    }

    public function scopeAggressionFearQuestions($query)
    {
        return $query->where('type', 'aggression_fear')->get();
    }
}
