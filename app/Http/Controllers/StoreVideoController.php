<?php

namespace App\Http\Controllers;

use App\Models\StoreVideo;
use App\Http\Requests\StoreStoreVideoRequest;
use App\Http\Requests\UpdateStoreVideoRequest;

class StoreVideoController extends Controller
{
    public function index()
    {
        $videos = StoreVideo::all();
        return view('settings.monitor', compact('videos'));
    }


    public function create()
    {
        //
    }

    public function store(StoreStoreVideoRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('public/videos');
            $filename = basename($path);

            StoreVideo::create([
                'judul' => $validated['judul'],
                'path' => "storage/videos/" . $filename,
            ]);

            return redirect()->back()->with('success', 'Video berhasil diunggah!');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah video!');
    }

    public function show(StoreVideo $storeVideo)
    {
        //
    }

    public function edit(StoreVideo $storeVideo)
    {
        //
    }

    public function update(UpdateStoreVideoRequest $request, StoreVideo $storeVideo)
    {
        //
    }

    public function destroy(StoreVideo $storeVideo, $videoId)
    {
        $video = StoreVideo::findOrFail($videoId);

        if (file_exists($video->path)) {
            unlink($video->path);
        }

        $video->delete();

        return response()->json(['success' => true, 'message' => 'Video deleted successfully'], 200);
    }
}
