<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
   
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }
   
}
