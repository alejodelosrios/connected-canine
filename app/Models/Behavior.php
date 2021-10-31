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
        return $this->belongsToMany(\App\Models\Pets::class);
    }

    public function scopeBehavioralBackgroundQuestions($query)
    {
        return $query->where('type', 'background')->get();
    }
}
