<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Ramsey\Uuid\Uuid;
use App\Models\ApiKey;
use Nette\Utils\Random;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiKeysController extends Controller
{
    public function index()
    {
        $apiKeys = ApiKey::where('user_id', Auth::id())->get();

        return Inertia::render('ApiKey/Index', [
            'apiKeys' => $apiKeys,
        ]);
    }

    public function create()
    {
        return Inertia::render('ApiKey/Create');
    }

    public function store(Request $request)
    {
        $randomString = Random::generate(16);
        $request->validate([
            'name' => ['string', 'required', 'max:255'],
        ]);

        ApiKey::create([
            'uuid' => 'api-' . Str::uuid(),
            'user_id' => Auth::id(),
            'name' => $request->name,
            'key' =>  $randomString,
        ]);

        return redirect()->route('api-keys');
    }

    public function destroy(ApiKey $apiKey)
    {
        $apiKey->delete();

        return redirect()->route('api-keys');
    }
}
