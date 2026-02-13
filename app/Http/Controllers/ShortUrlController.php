<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use App\Models\User;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('SuperAdmin')) {
            abort(403);
        }

        if ($user->hasRole('Admin')) {
            $urls = ShortUrl::where('company_id', '!=', $user->company_id)->get();
        } elseif ($user->hasRole('Member')) {
            $urls = ShortUrl::where('user_id', '!=', $user->id)->get();
        } else {
            $urls = ShortUrl::all();
        }

        return view('short_urls.index', compact('urls'));
    }

    public function create()
    {

        $this->authorize('create', ShortUrl::class);

        return view('short_urls.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', ShortUrl::class);

        $user = auth()->user();

        ShortUrl::create([
            'company_id' => $user->company_id,
            'user_id' => $user->id,
            'original_url' => $request->original_url,
            'short_code' => Str::random(6),
        ]);

        return redirect()->route('short-urls.index');
    }

}
