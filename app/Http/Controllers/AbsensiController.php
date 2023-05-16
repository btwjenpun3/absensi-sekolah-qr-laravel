<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Carbon\CarbonInterface;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/scan', [
            "title" => "Scan QR",
            "titlepage" => "Scan QR"
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        $data_nis = $request->absensi;
        $muridId = Murid::where('nis', $data_nis)->first()->id;

        // Verifikasi Absensi supaya tidak absensi 2x dalam 1 hari
        $ambilWaktu = Absensi::latest()->where('murid_id', $muridId)->first()->created_at ?? 0;
 
        $konversiWaktuHadir = Carbon::parse($ambilWaktu)->format('Y-m-d');     
         
        $verifikasiWaktu = Carbon::now()->format('Y-m-d'); 
        
        $hariIni = Carbon::now()->locale('id')->format('l');
        $tanggalHariIni = Carbon::now()->format('d'); 
        $jamHariIni = Carbon::now()->format('H:i:s'); 
        $bulanHariIni = Carbon::now()->locale('id')->format('F');

        if($jamHariIni > '07:00:00'){
           $status = 2; // Status terlambat
        }
        else{ 
           $status = 1; // Status masuk
        };         
        
        if($konversiWaktuHadir == $verifikasiWaktu){
            return redirect('/scan-qr')->with('fail','');
        }
        else {
            $absensi = new Absensi;
            $absensi->murid_id = $muridId;
            $absensi->hari = $hariIni;
            $absensi->tanggal = $tanggalHariIni;
            $absensi->bulan = $bulanHariIni;
            $absensi->jam_absen = $jamHariIni;
            $absensi->status = $status;                 
            $absensi->save();
            return redirect('/scan-qr')->with('success','');
        };
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}