<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tahun;
use App\Models\IsAdmin;

class TahunController extends Controller
{
    public function index()
    {
        // Verifikasi untuk User yang login apakah dia Admin
            $verifikasiAdmin = new IsAdmin();
            $verifikasiAdmin->isAdmin(); 
        // Jika status=1, maka akan lanjut kode di bawah
        // Jika status != 1, maka akan 403 Forbidden

        $tahun = Tahun::orderBy('tahun')->get();
        return view('pages/tahun/daftar', [
            "title" => "Data Tahun",
            "titlepage" => "Data Tahun",
            "tahun" => $tahun
        ]);
    }

    public function store(Request $request)
    {
        // Verifikasi untuk User yang login apakah dia Admin
            $verifikasiAdmin = new IsAdmin();
            $verifikasiAdmin->isAdmin(); 
        // Jika status=1, maka akan lanjut kode di bawah
        // Jika status != 1, maka akan 403 Forbidden

        $tahun = new Tahun;
        $tahun->tahun = $request->tahun;
        $tahun->created_at = now();
        $tahun->updated_at = now();
        $tahun->save();

        return redirect('/tahun')->with('success','');
    }
}
