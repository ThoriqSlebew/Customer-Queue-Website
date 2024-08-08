<?php

// app/Http/Controllers/QueueController.php
namespace App\Http\Controllers;

use App\Models\AntreanCs;
use App\Models\AntreanTeller;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function printQueue($type)
    {
        if ($type == 'teller') {
            $type = 'Teller';
            $tanggal = Carbon::now()->format('Y-m-d');
            $tanggalFormat = Carbon::now()->format('l, d F Y');
            $jamFormat = Carbon::now()->format('H:i:s');
            $unit = Unit::all();
            $antreanSelanjutnya = AntreanTeller::whereDate('tanggal', $tanggal)
                ->where('status', 1)
                ->orderBy('no_antrean', 'desc')
                ->first();
            $antreanSelanjutnyaFormat = 'TL' . str_pad($antreanSelanjutnya->no_antrean, 3, '0', STR_PAD_LEFT);
            $sisaAntrean = AntreanTeller::whereDate('tanggal', $tanggal)->where('status', 1)->count();
        } else {
            $type = 'CS';
            $tanggal = Carbon::now()->format('Y-m-d');
            $tanggalFormat = Carbon::now()->format('l, d F Y');
            $jamFormat = Carbon::now()->format('H:i:s');
            $unit = Unit::all();
            $antreanSelanjutnya = AntreanCs::whereDate('tanggal', $tanggal)
                ->where('status', 1)
                ->orderBy('no_antrean', 'desc')
                ->first();
            $antreanSelanjutnyaFormat = 'CS' . str_pad($antreanSelanjutnya->no_antrean, 3, '0', STR_PAD_LEFT);
            $sisaAntrean = AntreanCs::whereDate('tanggal', $tanggal)->where('status', 1)->count();
        }

        return view('print', compact('unit', 'type', 'tanggalFormat', 'jamFormat', 'antreanSelanjutnyaFormat', 'sisaAntrean'));
    }
}
