<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::where('user_id', auth()->id())->get();
        return Inertia::render('Domains/Index', [
            'domains' => $domains,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(['url' => 'required|url']);
        Domain::create([
            'url' => $request->url,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('domains.index');
    }
}
