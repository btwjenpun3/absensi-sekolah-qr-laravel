<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        $data_nis = $request->absensi;
        $muridId = Murid::where('nis', $data_nis)->first()->id ?? 0;

        if($muridId === 0)
        {
            return response()->json(['message' => 'Terjadi Kesalahan : Murid tidak di temukan.'], 400);
        };

        $kelasId = Murid::where('nis', $data_nis)->first()->kelas_id;

        // Verifikasi Absensi supaya tidak absensi 2x dalam 1 hari
        $ambilWaktu = Absensi::latest()->where('murid_id', $muridId)->first()->created_at ?? 0;
 
        $konversiWaktuHadir = Carbon::parse($ambilWaktu)->format('Y-m-d');     
         
        $verifikasiWaktu = Carbon::now()->format('Y-m-d'); 
        
        $hariIni = Carbon::now()->locale('id')->translatedFormat('l');
        $tanggalHariIni = Carbon::now()->translatedFormat('d'); 
        $jamHariIni = Carbon::now()->translatedFormat('H:i:s'); 
        $bulanHariIni = Carbon::now()->locale('id')->translatedFormat('F');

        if($jamHariIni > '07:00:00'){
           $status = 2; // Status terlambat
        }
        else{ 
           $status = 1; // Status masuk
        };         
        
        if($konversiWaktuHadir == $verifikasiWaktu){
            // return redirect('/scan-qr')->with('fail','');
            return response()->json(['message' => 'Terjadi Kesalahan : Murid sudah melakukan Absen.'], 400);
        }
        else {
            $data = [
                'murid_id' => $muridId,
                'kelas_id' => $kelasId,
                'hari' => $hariIni,
                'tanggal' => $tanggalHariIni,
                'bulan' => $bulanHariIni,
                'jam_absen' => $jamHariIni,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now()
            ];
            
            Absensi::insert($data);
            // return redirect('/scan-qr')->with('success','');
            return response()->json(['message' => 'Absensi berhasil. Silahkan masuk ke kelas.'], 200);
        };
    }

    public function gantiHari(Absensi $absensi)
    {
        
        $today = Carbon::now()->toDateString();

        $data = Murid::all();       

        $hariIni = Carbon::now()->locale('id')->translatedFormat('l');
        $tanggalHariIni = Carbon::now()->translatedFormat('d'); 
        $jamHariIni = Carbon::now()->translatedFormat('H:i:s'); 
        $bulanHariIni = Carbon::now()->locale('id')->translatedFormat('F');
        
        foreach($data as $d){
            $dataAbsen = Absensi::where('murid_id', $d->id)->whereDate('created_at', $today)->get();
            if($dataAbsen->isEmpty()) {
                $absensi = new Absensi;
                $absensi->murid_id = $d->id;
                $absensi->kelas_id = $d->kelas_id;
                $absensi->hari = $hariIni;
                $absensi->tanggal = $tanggalHariIni;
                $absensi->bulan = $bulanHariIni;
                $absensi->jam_absen = $jamHariIni;
                if($hariIni == 'Minggu'){
                    $absensi->status = 4;
                }
                else {
                    $absensi->status = 0; 
                }                                
                $absensi->save();                
            }
            else 
            {
                
            }
        }
    }  
    /**
     * Display the specified resource.
     */
    public function show_range(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        // Lakukan query ke database sesuai dengan startDate dan endDate
            $data = Absensi::where('murid_id', $request->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

            return response()->json($data); 

        // Mengembalikan data dalam format JSON sebagai respons
        // Simpan hasil query ke dalam variabel $data
        
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
