<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Penduduk extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nik', 'nama', 'password', 'JK', 'alamat',
    ];

    protected $hidden = [
        'password', // Pastikan password disembunyikan
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
