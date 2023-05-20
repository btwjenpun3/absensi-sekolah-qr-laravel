<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Kelas;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{

    public function downloadKartuSatuan(Murid $murid)
    {         
        $pdf = PDF::loadView('/pages/murid/kartu-s', [
            'data' => $murid,
            "qr" => QrCode::size(80)->generate($murid->nis)
        ]);
        return $pdf->download('Kartu-Absen-'.$murid->nis.'.pdf');
    }

    
    public function downloadKartuMassal(Murid $murid, Kelas $kelas)
    {         
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
