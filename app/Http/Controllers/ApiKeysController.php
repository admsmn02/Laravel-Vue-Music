<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Ramsey\Uuid\Uuid;
use App\Models\ApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

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
        $randomString = Random::generate(32);
        $request->validate([
            'name' => ['string', 'required', 'max:255'],
        ]);

        $apiKey = ApiKey::create([
            'uuid' => 'api-' . Uuid::uuid4(),
            'user_id' => Auth::id(),
            'name' => $request->name,
            'key' =>  $randomString,
        ]);

        return redirect()->route('api-keys.index');
    }

    public function destroy(ApiKey $apiKey)
    {
        $apiKey->delete();

        return redirect()->route('api-keys.index');
    }
}
