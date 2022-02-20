<?php

namespace App\Models;

use App\Traits\HasUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    use HasFactory;
    use HasUUID;

    const PENDING = "pending";
    const CANCELLED = "cancelled";
    const ACCEPTED = "accepted";

    protected $fillable = ["pet_id", "date"];

    protected $casts = [
        "created_at" => "datetime",
    ];

    public function services()
    {
        return $this->belongsToMany(
            \App\Models\Service::class,
            "booking_details"
        );
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function getFormattedDateAttribute()
    {
        $formattedDate = Carbon::parse($this->date)->format("M d Y");
        return $formattedDate;
    }
    public static function getNewReservations()
    {
        $reservations = Booking::where("date", ">", now())->get();
        $owners = [];
        foreach ($reservations as $reservation) {
            $owners[$reservation->id]["employee"] =
                $reservation->pet->owner->fullName;
            $owners[$reservation->id]["pet"] = $reservation->pet->name;
            $owners[$reservation->id]["date"] = $reservation->formattedDate;
        }
        return $owners;
    }
    public static function getOldReservations()
    {
        $reservations = Booking::where("date", "<=", now())->get();
        $owners = [];
        foreach ($reservations as $reservation) {
            $owners[$reservation->id]["employee"] =
                $reservation->pet->owner->fullName;
            $owners[$reservation->id]["pet"] = $reservation->pet->name;
            $owners[$reservation->id]["date"] = $reservation->formattedDate;
        }
        return $owners;
    }
}
