<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'attended',
        'scuffle_event',
        'scuffle_description',
        'forbidden_assistance',
        'accomodations',
        'accomodations_description',
        'comments',
    ];

    protected $casts = [
        'attended' => 'boolean',
        'scuffle_event' => 'boolean',
        'forbidden_assistance' => 'boolean',
        'accomodations' => 'boolean',
    ];
}
