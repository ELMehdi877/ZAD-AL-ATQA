<?php

namespace App\Http\Controllers;

use App\Models\Halaqa;
use App\Http\Requests\StoreHalaqaRequest;
use App\Http\Requests\UpdateHalaqaRequest;
use App\Models\User;

class HalaqaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halaqas = Halaqa::orderBy('id', 'asc')->get();
        return view('admin.halaqas.index', compact('halaqas'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createHalaqaPage()
    {
        $users = User::where('role', 'cheikh')
        ->orderBy('id', 'asc')->get();

        return view('admin.halaqas.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHalaqaRequest $request)
    {
        $data = $request->validated();
        $halaqa = Halaqa::create($data);

        return redirect()->route('halaqas.index')
            ->with('success', 'Nouveau Halaqa '.$halaqa->nom_halaqa.' créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Halaqa $halaqa)
    {
        // return view('admin.halaqas.show', compact('halaqa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Halaqa $halaqa)
    {
        $users = User::where('role', 'cheikh')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.halaqas.edit', compact('halaqa', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHalaqaRequest $request, Halaqa $halaqa)
    {
        $data = $request->validated();
        $halaqa->update($data);

        return redirect()->route('halaqas.index')
            ->with('success', 'Halaqa '.$halaqa->nom_halaqa.' modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Halaqa $halaqa)
    {
        $halaqa->delete();

        return redirect()->route('halaqas.index')
            ->with('success', 'Halaqa '.$halaqa->nom_halaqa.' supprimé !');
    }

    
}
