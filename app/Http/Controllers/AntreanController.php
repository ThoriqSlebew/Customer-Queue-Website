<?php

namespace App\Http\Controllers;

use App\Models\AntreanCs;
use App\Models\AntreanTeller;
use App\Http\Requests\StoreAntreanCsRequest;
use App\Http\Requests\StoreAntreanTellerRequest;
use Carbon\Carbon;

class AntreanController extends Controller
{
    public function index()
    {
        $tanggal = Carbon::now()->format('Y-m-d');

        $lastAntreanTeller = AntreanTeller::whereDate('tanggal', $tanggal)->orderBy('no_antrean', 'desc')->first();
        $nomorTerakhirTeller = $lastAntreanTeller ? $lastAntreanTeller->no_antrean : 0;
        $nomorAntreanTeller = 'TL' . str_pad($nomorTerakhirTeller, 3, '0', STR_PAD_LEFT);
        $nextAntreanTeller = $lastAntreanTeller ? $lastAntreanTeller->no_antrean + 1 : 1;

        $lastAntreanCs = AntreanCs::whereDate('tanggal', $tanggal)->orderBy('no_antrean', 'desc')->first();
        $nomorTerakhirCs = $lastAntreanCs ? $lastAntreanCs->no_antrean : 0;
        $nomorAntreanCs = 'CS' . str_pad($nomorTerakhirCs, 3, '0', STR_PAD_LEFT);
        $nextAntreanCs = $lastAntreanCs ? $lastAntreanCs->no_antrean + 1 : 1;

        return view('ambil-antrean', compact('tanggal', 'nomorAntreanTeller', 'nextAntreanTeller', 'nomorAntreanCs', 'nextAntreanCs'));
    }

    public function storeTeller(StoreAntreanTellerRequest $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'no_antrean' => 'required',
            'status' => 'required',
        ]);

        AntreanTeller::create([
            'tanggal' => $request->tanggal,
            'no_antrean' => $request->no_antrean,
            'status' => $request->status,
        ]);

        return redirect()->route('ambil-antrean.index');
    }

    public function storeCs(StoreAntreanCsRequest $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'no_antrean' => 'required',
            'status' => 'required',
        ]);

        AntreanCs::create([
            'tanggal' => $request->tanggal,
            'no_antrean' => $request->no_antrean,
            'status' => $request->status,
        ]);

        return redirect()->route('ambil-antrean.index');
    }
}
