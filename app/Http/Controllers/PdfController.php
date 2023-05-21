<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Kelas;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\IsAdmin;
class PdfController extends Controller
{

    public function downloadKartuSatuan(Murid $murid)
    {         
        // Verifikasi untuk User yang login apakah dia Admin
            $verifikasiAdmin = new IsAdmin();
            $verifikasiAdmin->isAdmin(); 
        // Jika status=1, maka akan lanjut kode di bawah
        // Jika status != 1, maka akan 403 Forbidden

        $pdf = PDF::loadView('/pages/murid/kartu-s', [
            'data' => $murid,
            "qr" => QrCode::size(80)->generate($murid->nis)
        ]);
        return $pdf->download('Kartu-Absen-'.$murid->nis.'.pdf');
    }

    
    public function downloadKartuMassal(Murid $murid, Kelas $kelas)
    {        
        // Verifikasi untuk User yang login apakah dia Admin
            $verifikasiAdmin = new IsAdmin();
            $verifikasiAdmin->isAdmin(); 
        // Jika status=1, maka akan lanjut kode di bawah
        // Jika status != 1, maka akan 403 Forbidden

        $murid = Murid::where('kelas_id', $kelas->id)->get();        

        if(count($murid) > 0) {
            foreach($murid as $m) {
                $qr = QrCode::size(80)->generate($m->nis);

                $data[] = [
                    'nama' => $m->nama,
                    'kelas' => $m->kelas->kelas,
                    'nis' => $m->nis,
                    'qr' => $qr
                ];
            }         
            $pdf = PDF::loadView('/pages/murid/kartu-m', [
                'data' => $data
            ]);
            return $pdf->download('Kartu-Absen-'.$kelas->kelas.'.pdf');
            return view('/kelas');
        }
        else {
            return redirect('/kelas/daftar')->with('fail_qr','');
        }    
    }    
    
}
