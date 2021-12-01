<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id', 'rabies', 'bordetella', 'dhhp', 'proof',
        'has_rabies', 'has_bordetella', 'has_dhhp'
    ];

    protected $casts = [
        'has_rabies' => 'boolean',
        'has_bordetella' => 'boolean',
        'has_dhhp' => 'boolean'
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
}
