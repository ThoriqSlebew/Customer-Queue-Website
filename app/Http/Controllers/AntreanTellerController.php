<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAntreanCsRequest;
use Carbon\Carbon;
use App\Models\AntreanTeller;
use App\Http\Requests\StoreAntreanTellerRequest;
use App\Http\Requests\UpdateAntreanTellerRequest;
use App\Models\AntreanCs;

class AntreanTellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(AntreanTeller $antreanTeller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AntreanTeller $antreanTeller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAntreanTellerRequest $request, AntreanTeller $antreanTeller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AntreanTeller $antreanTeller)
    {
        //
    }
}
