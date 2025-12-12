<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'code',
        'quota'
    ];

    public function rsvp()
    {
        return $this->hasOne(Rsvp::class);
    }

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }
}