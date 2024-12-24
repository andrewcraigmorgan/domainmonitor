<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::all();
        return view('domains.index', compact('domains'));
    }

    public function store(Request $request)
    {
        $request->validate(['url' => 'required|url']);
        Domain::create($request->only('url'));
        return redirect('/');
    }
}
