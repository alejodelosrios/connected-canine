<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }

    public function boardingHistory()
    {
        return $this->hasOne(\App\Models\BoardingHistory::class);
    }

    public function hasBooking()
    {
        return $this->bookings()
            ->where('date', '>=', Carbon::today())
            ->where('status', '<>', \App\Models\Booking::CANCELLED)
            ->count() >= 1;
    }
    public function hasBoardingHistory()
    {
        return !is_null($this->boardingHistory);
    }
}
