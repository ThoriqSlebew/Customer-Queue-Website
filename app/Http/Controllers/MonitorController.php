<?php

namespace App\Http\Controllers;

use App\Models\AntreanCs;
use Carbon\Carbon;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\AntreanTeller;
use App\Models\StoreVideo;

class MonitorController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        $videoId = $unit->first()->video_id;
        $video = StoreVideo::find($videoId);

        $tanggal = Carbon::now()->format('Y-m-d');

        $antreanTeller = AntreanTeller::whereDate('tanggal', $tanggal)
            ->where('status', 2)
            ->orderBy('no_antrean', 'desc')
            ->first();
        $antreanTellerFormat = $antreanTeller ? 'TL' . str_pad($antreanTeller->no_antrean, 3, '0', STR_PAD_LEFT) : 'Belum ada';
        $antreanTellerCounter = $antreanTeller ? $antreanTeller->no_counter : '-';

        $jumlahAntreanTeller = AntreanTeller::whereDate('tanggal', $tanggal)->count();
        $sisaAntreanTeller = AntreanTeller::whereDate('tanggal', $tanggal)->where('status', 1)->count();

        $antreanCs = AntreanCs::whereDate('tanggal', $tanggal)
            ->where('status', 2)
            ->orderBy('no_antrean', 'desc')
            ->first();
        $antreanCsFormat = $antreanCs ? 'CS' . str_pad($antreanCs->no_antrean, 3, '0', STR_PAD_LEFT) : 'Belum ada';
        $antreanCsCounter = $antreanCs ? $antreanCs->no_counter : '-';

        $jumlahAntreanCs = AntreanCs::whereDate('tanggal', $tanggal)->count();
        $sisaAntreanCs = AntreanCs::whereDate('tanggal', $tanggal)->where('status', 1)->count();

        return view('monitor', compact('unit', 'video', 'antreanTellerFormat', 'antreanTellerCounter', 'jumlahAntreanTeller', 'sisaAntreanTeller', 'antreanCsFormat', 'antreanCsCounter', 'jumlahAntreanCs', 'sisaAntreanCs'));
    }

    public function getAntrean()
    {
        $tanggal = Carbon::now()->format('Y-m-d');

        $antreanTeller = AntreanTeller::whereDate('tanggal', $tanggal)
            ->where('status', 2)
            ->orderBy('no_antrean', 'desc')
            ->first();
        $antreanTellerFormat = $antreanTeller ? 'TL' . str_pad($antreanTeller->no_antrean, 3, '0', STR_PAD_LEFT) : 'Belum ada';
        $antreanTellerCounter = $antreanTeller ? $antreanTeller->no_counter : '-';

        $jumlahAntreanTeller = AntreanTeller::whereDate('tanggal', $tanggal)->count();
        $sisaAntreanTeller = AntreanTeller::whereDate('tanggal', $tanggal)->where('status', 1)->count();

        $antreanCs = AntreanCs::whereDate('tanggal', $tanggal)
            ->where('status', 2)
            ->orderBy('no_antrean', 'desc')
            ->first();
        $antreanCsFormat = $antreanCs ? 'CS' . str_pad($antreanCs->no_antrean, 3, '0', STR_PAD_LEFT) : 'Belum ada';
        $antreanCsCounter = $antreanCs ? $antreanCs->no_counter : '-';

        $jumlahAntreanCs = AntreanCs::whereDate('tanggal', $tanggal)->count();
        $sisaAntreanCs = AntreanCs::whereDate('tanggal', $tanggal)->where('status', 1)->count();

        return response()->json([
            'antrean_teller' => $antreanTellerFormat,
            'antrean_teller_counter' => $antreanTellerCounter,
            'jumlah_antrean_teller' => $jumlahAntreanTeller,
            'sisa_antrean_teller' => $sisaAntreanTeller,
            'antrean_cs' => $antreanCsFormat,
            'antrean_cs_counter' => $antreanCsCounter,
            'jumlah_antrean_cs' => $jumlahAntreanCs,
            'sisa_antrean_cs' => $sisaAntreanCs,
        ]);
    }
}
