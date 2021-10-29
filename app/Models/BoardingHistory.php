<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'attendend',
        'scuffle_event',
        'scuffle_description',
        'forbidden_assistance',
        'accomodations',
        'accomodations_description',
        'commnets',
    ];

    protected $casts = [
        'attendend' => 'boolean',
        'scuffle_event' => 'boolean',
        'forbidden_assistance' => 'boolean',
        'accomodations' => 'boolean',
    ];
}
