<?php

namespace App\Http\Controllers;

use App\Models\AntreanCs;
use App\Models\AntreanTeller;
use App\Models\Unit;
use App\Models\StoreVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function monitor()
    {
        $title = 'Manajemen Monitor';
        $slug = 'monitor';

        $user = Auth::user();
        $unit = $user->unit;
        $namaUnit = $unit->nama;
        $videos = StoreVideo::all();

        return view('settings.monitor', compact('title', 'slug', 'unit', 'videos', 'namaUnit'));
    }

    public function operasional()
    {
        $title = 'Manajemen Operasional';
        $slug = 'operasional';

        $jumlahAntreanTeller = AntreanTeller::count();
        $tanggalAwalTeller = AntreanTeller::orderBy('tanggal', 'asc')->first()->tanggal ?? '-';
        $tanggalAkhirTeller = AntreanTeller::orderBy('tanggal', 'desc')->first()->tanggal ?? '-';

        $jumlahAntreanCs = AntreanCs::count();
        $tanggalAwalCs = AntreanCs::orderBy('tanggal', 'asc')->first()->tanggal ?? '-';
        $tanggalAkhirCs = AntreanCs::orderBy('tanggal', 'desc')->first()->tanggal ?? '-';

        $user = Auth::user();
        $unit = $user->unit;
        $namaUnit = $unit->nama;

        return view('settings.operasional', compact('title', 'slug', 'unit', 'namaUnit', 'jumlahAntreanTeller', 'tanggalAwalTeller', 'tanggalAkhirTeller', 'jumlahAntreanCs', 'tanggalAwalCs', 'tanggalAkhirCs'));
    }

    public function unit()
    {
        $title = 'Manajemen Unit';
        $slug = 'unit';

        $user = Auth::user();
        $unit = $user->unit;
        $namaUnit = $unit->nama;

        return view('settings.unit', compact('title', 'slug', 'unit', 'namaUnit'));
    }

    public function updateMonitor(Request $request, $unitId)
    {
        $unit = Unit::findOrFail($unitId);
        $unit->running_text = $request->input('running_text');
        $unit->video_id = $request->input('video_id');
        $unit->save();

        return redirect()->back()->with('success', 'Monitor updated successfully.');
    }

    public function updateUnit(Request $request, $unitId)
    {
        $unit = Unit::findOrFail($unitId);
        $unit->nama = $request->input('nama');
        $unit->alamat = $request->input('alamat');
        $unit->no_telp = $request->input('no_telp');
        $unit->save();

        return redirect()->back()->with('success', 'Unit updated successfully.');
    }

    public function resetTeller()
    {
        AntreanTeller::truncate();
        return redirect()->route('settings.operasional')->with('success', 'Data antrean teller berhasil direset.');
    }

    public function resetCs()
    {
        AntreanCs::truncate();
        return redirect()->route('settings.operasional')->with('success', 'Data antrean cs berhasil direset.');
    }

    public function addTeller($unitId)
    {
        $unit = Unit::findOrFail($unitId);
        if ($unit->jumlah_teller < 5) {
            $unit->jumlah_teller += 1;
            $unit->save();
        }

        return redirect()->back()->with('success', 'Teller added successfully.');
    }

    public function removeTeller($unitId)
    {
        $unit = Unit::findOrFail($unitId);
        if ($unit->jumlah_teller > 0) {
            $unit->jumlah_teller -= 1;
            $unit->save();
        }

        return redirect()->back()->with('success', 'Teller removed successfully.');
    }

    public function addCs($unitId)
    {
        $unit = Unit::findOrFail($unitId);
        if ($unit->jumlah_cs < 5) {
            $unit->jumlah_cs += 1;
            $unit->save();
        }

        return redirect()->back()->with('success', 'Customer Services added successfully.');
    }

    public function removeCs($unitId)
    {
        $unit = Unit::findOrFail($unitId);
        if ($unit->jumlah_cs > 0) {
            $unit->jumlah_cs -= 1;
            $unit->save();
        }

        return redirect()->back()->with('success', 'Customer Services removed successfully.');
    }
}
