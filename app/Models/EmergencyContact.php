<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EmergencyContact extends Model
{
    use HasFactory;

    protected $fillable = ["name", "lastname", "phone", "email"];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
