<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Models\Student;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = Competition::orderBy('id', 'asc')->get();

        return view('admin.competitions.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::with('user')
            ->orderBy('id', 'asc')
            ->get();
        return view('admin.competitions.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetitionRequest $request)
    {
        $data = $request->validated();

        $competition = Competition::create($data);

        if (!empty($data['students'])) {
            $competition->students()->attach($data['students'], ['status' => 'valide']);
        }
        
        return redirect()->route('competitions.index')
            ->with('success', 'Nouvelle compétition ' . $competition->titre . ' créée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition)
    {
        return view('admin.competitions.show', compact('competition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition)
    {
        $students = Student::with('user')
            ->whereDoesntHave('')
            ->orderBy('id', 'asc')
            ->get();
        return view('admin.competitions.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompetitionRequest $request, Competition $competition)
    {
        $data = $request->validated();
        $competition->update($data);

        return redirect()->route('competitions.index')
            ->with('success', 'Compétition ' . $competition->titre . ' modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()->route('competitions.index')
            ->with('success', 'Compétition ' . $competition->titre . ' supprimée !');
    }
}
