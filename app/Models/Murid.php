<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    // Ini untuk mengijinkan Laravel mengisi tabel database dengan nama berikut
    // jika menggunakan tinker
    protected $guarded = ['id'];
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
    
}

