<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'message',
        'is_approved'
    ];

    protected $casts = [
        'is_approved' => 'boolean'
    ];
}