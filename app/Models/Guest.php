<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guests';

    /**
     * The attributes that are mass assignable.
     *
     * Kami tidak menyertakan 'code' di sini, asumsikan 'code' di-generate/diatur di tempat lain,
     * tetapi kita masukkan jika akan diisi dari form.
     */

    protected $fillable = [
        'name',
        'email',
        'phone',
        'code',
        'quota'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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