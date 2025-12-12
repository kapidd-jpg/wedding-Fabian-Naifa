<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'checked_in_at',
        'checked_by'
    ];

    protected $casts = [
        'checked_in_at' => 'datetime'
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}