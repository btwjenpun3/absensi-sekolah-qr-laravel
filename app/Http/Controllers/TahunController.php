<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tahun;

class TahunController extends Controller
{
    public function index()
    {
        $tahun = Tahun::orderBy('tahun')->get();
        return view('pages/master/tahun', [
            "title" => "Data Tahun",
            "titlepage" => "Data Tahun",
            "tahun" => $tahun
        ]);
    }

    public function store(Request $request)
    {
        $tahun = new Tahun;
        $tahun->tahun = $request->tahun;
        $tahun->created_at = now();
        $tahun->updated_at = now();
        $tahun->save();

        return redirect('/tahun')->with('success','');
    }
}
