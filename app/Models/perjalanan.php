<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perjalanan extends Model
{
    use HasFactory;
    
    protected $table = 'perjalanans';
    protected $fillable = ['id','tanggal','waktu','lokasi','suhu_tubuh'];
}
