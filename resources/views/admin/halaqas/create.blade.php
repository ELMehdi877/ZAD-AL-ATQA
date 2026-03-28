@extends('layouts.admin')

@section('title', 'Créer Halaqa')

@section('content')

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold">Créer une halaqa</h2>
            <p class="text-sm text-slate-500">Créer un groupe, assigner un cheikh et ajouter des étudiants.</p>
        </div>
        <a href="{{ route('halaqas.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-50">Retour liste</a>
    </div>

    <section class="max-w-3xl rounded-xl bg-white p-5 shadow">
        <form method="POST" action="{{ route('halaqa.store') }}" class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            @csrf
            
            <div class="sm:col-span-2">
                <label class="mb-1 block text-sm font-medium" for="nom_halaqa">Nom de la halaqa</label>
                <input id="nom_halaqa" name="nom_halaqa" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('nom_halaqa') }}">
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium" for="capacite">Capacité max</label>
                <input id="capacite" name="capacite" type="number" min="1" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('capacite', 20) }}">
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium" for="cheikh_id">Enseignant (Cheikh)</label>
                <select id="cheikh_id" name="cheikh_id" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    <option value="">-- Choisir un Cheikh --</option>
                    @forelse ($cheikhs as $cheikh)
                        <option value="{{ $cheikh->id }}" @selected(old('cheikh_id') == $cheikh->id)>
                            {{ $cheikh->nom }} {{ $cheikh->prenom }}
                        </option>
                    @empty
                        <option value="" disabled>Aucun Cheikh disponible</option>
                    @endforelse
                </select>
            </div>

            <div class="sm:col-span-2 mt-2">
                <label class="mb-1 block text-sm font-medium text-slate-700">Ajouter des Étudiants</label>
                
                <div class="h-48 overflow-y-auto border border-slate-300 rounded-lg p-3 bg-slate-50">
                    @forelse ($students as $student)
                        <label class="flex items-center p-2 hover:bg-emerald-50 rounded cursor-pointer">
                            <input type="checkbox" name="students[]" value="{{ $student->id }}" class="w-4 h-4 text-emerald-600 border-slate-300 rounded focus:ring-emerald-500">
                            <span class="ml-3 text-sm font-medium text-slate-700">{{ $student->nom }} {{ $student->prenom }}</span>
                        </label>
                    @empty
                        <p class="text-sm text-slate-500 p-2">Aucun étudiant disponible.</p>
                    @endforelse
                </div>
            </div>

            <div class="sm:col-span-2 mt-4">
                <button type="submit" class="rounded-lg bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-500">
                    Créer la halaqa
                </button>
            </div>
        </form>
    </section>

@endsection