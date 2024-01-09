<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Track;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;


class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::where('display', true)->orderByDesc('id')->get();

        return Inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);
    }

    public function create()
    {
        return Inertia::render('Track/Create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => ['string', 'required', 'max:255'],
            'artist' => ['string', 'required', 'max:255'],
            'image' => ['image', 'required'],
            'music' => ['file', 'required', 'extensions:mp3,wav,ogg'],
            'display' => ['boolean', 'required'],
        ]);

        $uuid = 'trk-' . Uuid::uuid4();

        $imageExtension = $request->image->extension();
        $imagePath = $request->image->storeAs('tracks/images', $uuid . '.' . $imageExtension);
        $request->image->storeAs('tracks/images', $uuid . '.' . $imageExtension);

        $musicExtension = $request->music->extension();
        $musicPath = $request->music->storeAs('tracks/musics', $uuid . '.' . $musicExtension);
        $request->music->storeAs('tracks/musics', $uuid . '.' . $musicExtension);

        Track::create([
            'uuid' => $uuid,
            'title' => $request->title,
            'artist' => $request->artist,
            'display' => $request->display,
            'image' => $imagePath,
            'music' => $musicPath,
        ]);

        return redirect()->route('tracks.index');
    }
}
