<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = \App\Models\Company::all();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $this->authorize('create', Company::class);
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Company::class);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Company::create([
            'name' => $request->name
        ]);

        return redirect()->route('companies.index');
    }
}
