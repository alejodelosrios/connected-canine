<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'birthday',
        'sex',
        'weight',
        'color',
    ];

    public function owner()
    {
        return  $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
