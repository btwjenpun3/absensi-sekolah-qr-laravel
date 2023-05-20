<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ManajemenWaktu extends Model
{
    use HasFactory;

    public function ambilHari()
    {
        $data = Carbon::now()->locale('id')->translatedFormat('l');
        return $data;

    }

    public function ambilTanggal()
    {
        $data = Carbon::now()->format('d');
        return $data;

    }

    public function ambilBulan()
    {
        $data = Carbon::now()->locale('id')->translatedFormat('F');
        return $data;

    }

    public function ambilTahun()
    {
        $data = Carbon::now()->format('Y');
        return $data;

    }

    public function ambilTahunBulanTanggal()
    {
        $data = Carbon::now()->format('Y-m-d');
        return $data;

    }

    public function ambilJam()
    {
        $data = Carbon::now()->format('H:m:s');
        return $data;

    }
    
}
