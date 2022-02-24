<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        "breed_id",
        "question",
        "allergies",
        "medical_conditions",
        "parasite_control",
        "complete",
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
        return $this->belongsTo(
            \App\Models\Veterinarian::class,
            "veterinarian_id"
        );
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }
    public function medications()
    {
        return $this->hasMany(\App\Models\Medication::class);
    }

    public function boardingHistory()
    {
        return $this->hasOne(\App\Models\BoardingHistory::class);
    }

    public function behaviors()
    {
        return $this->belongsToMany(\App\Models\Behavior::class)
            ->orderBy("id")
            ->withPivot(["value", "comments"]);
    }

    public function vaccines()
    {
        return $this->hasOne(Vaccine::class);
    }

    public function behavioralBackground()
    {
        return $this->behaviors()
            ->where("type", "background")
            ->get()
            ->pluck("pivot")
            ->sortBy("behavior_id")
            ->pluck(["value"]);
    }

    public function separationConfinement()
    {
        return $this->behaviors()
            ->where("type", "separation_confinement")
            ->get()
            ->pluck("pivot")
            ->sortBy("behavior_id");
    }

    public function aggressionFear()
    {
        return $this->behaviors()
            ->where("type", "aggression_fear")
            ->get()
            ->pluck("pivot")
            ->sortBy("behavior_id");
    }

    public function hasBehavioralBackground()
    {
        return $this->behavioralBackground()->count() > 0;
    }

    public function hasSeparationConfinement()
    {
        return $this->separationConfinement()->count() > 0;
    }

    public function hasAggressionFear()
    {
        return $this->aggressionFear()->count() > 0;
    }

    public function hasBooking()
    {
        return $this->bookings()
            ->where("date", ">=", Carbon::today())
            ->where("status", "<>", \App\Models\Booking::CANCELLED)
            ->count() >= 1;
    }

    public function hasBoardingHistory()
    {
        return !is_null($this->boardingHistory);
    }
    public function hasMedications()
    {
        return !is_null($this->medications);
    }

    public function medicalConditions(): array
    {
        if (!is_null($this->medical_conditions)) {
            return explode(",", $this->medical_conditions);
        }
        return [];
    }

    public function breed()
    {
        return $this->belongsTo(\App\Models\Breed::class);
    }
    public function scopeCompletePets($query)
    {
        return $query->where("complete", true);
    }
}
