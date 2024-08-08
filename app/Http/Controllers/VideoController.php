<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video; // Pastikan menggunakan model Video yang benar
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255', // Validasi judul
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:5120000', // Batasan ukuran dan tipe file
        ]);

        if ($request->file('video')) {
            $path = $request->file('video')->store('public/videos');
            $filename = basename($path);

            // Simpan informasi video ke database
            $video = Video::create([
                'judul' => $request->judul, // Mengambil judul dari input form
                'path' => $path, // Menyimpan path lengkap sebagai referensi
            ]);

            return redirect()->back()->with('success', 'Video berhasil diunggah!');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah video!');
    }

    // Tambahkan metode lain di sini jika diperlukan, seperti untuk menampilkan video, mengedit, atau menghapus
}