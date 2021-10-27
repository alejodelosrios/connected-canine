<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    use HasUUID;

    protected $fillable = [
        'pet_id', 'date'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function services()
    {
        return $this->belongsToMany(\App\Models\Service::class, 'booking_details');
    }
}
