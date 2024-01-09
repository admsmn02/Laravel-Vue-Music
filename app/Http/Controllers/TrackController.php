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
        $tracks = Track::all();

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
            'title' => ['string', 'required'],
            'artist' => ['string', 'required'],
            'image' => ['file', 'required'],
            'music' => ['file', 'required'],
            'display' => ['boolean', 'required'],
        ]);

        $request->merge([
            'uuid' => Uuid::uuid4(),
        ]);

        Track::create($request->all());


        return redirect()->route('tracks.index');
    }
}
