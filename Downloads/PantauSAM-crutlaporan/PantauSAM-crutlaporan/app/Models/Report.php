<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['Nama_Lokasi', 'Latitude', 'Longitude', 'detail', 'image','status'];


    /**
     * Relasi ke tabel lokasi
     */

}
