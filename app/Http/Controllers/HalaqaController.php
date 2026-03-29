<?php

namespace App\Http\Controllers;

use App\Models\Halaqa;
use App\Http\Requests\StoreHalaqaRequest;
use App\Http\Requests\UpdateHalaqaRequest;
use App\Models\Membership;
use App\Models\Student;
use App\Models\User;

class HalaqaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halaqas = Halaqa::with('students')->orderBy('id', 'asc')->get();

        return view('admin.halaqas.index', compact('halaqas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createHalaqaPage()
    {
        $cheikhs = User::where('role', 'cheikh')
            ->orderBy('id', 'asc')
            ->get();

        $students = Student::with('user')
            ->whereDoesntHave('halaqas', function ($query) {
                $query->where('memberships.status', 'active');
            })
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.halaqas.create', compact('cheikhs', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHalaqaRequest $request)
    {
        $data = $request->validated();

        $halaqa = Halaqa::create($data);

        $halaqa->students()->attach($data['students'] ?? []);

        return redirect()->route('halaqas.index')
            ->with('success', 'Nouvelle Halaqa ' . $halaqa->nom_halaqa . ' créé !');
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
        $cheikhs = User::where('role', 'cheikh')
            ->orderBy('id', 'asc')
            ->get();

        $students = Membership::with('student.user')
            ->where('halaqa_id', $halaqa->id)
            ->get()
            ->pluck('student');

        $studentsNotInHalaqa = Student::with('user')
            ->whereDoesntHave('halaqas', function($query){
                $query->where('memberships.status', 'active');
            })
            ->orderBy('id', 'asc')
            ->get();


        return view('admin.halaqas.edit', compact('halaqa', 'cheikhs', 'students', 'studentsNotInHalaqa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHalaqaRequest $request, Halaqa $halaqa)
    {
        $data = $request->validated();
        $halaqa->update($data);
        $halaqa->students()->sync($data['students'] ?? []);

        return redirect()->route('halaqas.index')
            ->with('success', 'Halaqa ' . $halaqa->nom_halaqa . ' modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Halaqa $halaqa)
    {
        try {
            $halaqa->delete();
        } catch (\Exception $e) {
            return redirect()->route('halaqas.index')
                ->with('error', 'Impossible de supprimer la Halaqa ' . $halaqa->nom_halaqa . ' car elle a des étudiants associés.');
        }

        return redirect()->route('halaqas.index')
            ->with('success', 'Halaqa ' . $halaqa->nom_halaqa . ' supprimé !');
    }
}
