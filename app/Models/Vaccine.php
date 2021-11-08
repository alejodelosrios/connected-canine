<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id', 'rabies', 'bordetella', 'dhhp', 'proof'
    ];

    protected $dates = [
        'rabies', 'bordetella', 'dhhp'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }


    public function isUpToDate(string $vaccine_name)
    {
        $vaccinde_exp_date = $this->{$vaccine_name};
        if (is_null($vaccinde_exp_date)) {
            return false;
        }

        return now()->isBefore($vaccinde_exp_date);
    }

    public function hasBordetella()
    {
        return !is_null($this->bordetella);
    }

    public function hasDHHP()
    {
        return !is_null($this->dhhp);
    }

}
