<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan_infrastruktur'; // Sesuaikan nama tabel
    protected $fillable = ['judul', 'id_lokasi', 'detail_lokasi', 'status', 'file_path'];
}

