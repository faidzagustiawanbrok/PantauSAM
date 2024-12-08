<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['Nama_Lokasi', 'Latitude', 'Longitude', 'detail', 'image','status'];


    /**
     * Relasi ke tabel lokasi
     */
    public function user()
{
    return $this->belongsTo(User::class);
}
protected static function boot()
{
    parent::boot();

    static::creating(function ($report) {
        $report->user_id = Auth::id(); // Menambahkan user_id secara otomatis
    });
}
}
