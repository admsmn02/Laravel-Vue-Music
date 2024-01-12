<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;

class ApiKeyPlaylistController extends Controller
{
    public function playlists()
    {
        $apiKey = ApiKey::where('key', request()->header('x-api-key'))->first();
        $playlists = $apiKey->user->playlists()->get();
        return response()->json($playlists);
    }
}
