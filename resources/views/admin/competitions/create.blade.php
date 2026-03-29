@extends('layouts.admin')

@section('title', 'Nouvelle Competition')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold">Nouvelle competition</h2>
            <p class="text-sm text-slate-500">Creation d'une competition avec selection des participants.</p>
        </div>
        <a href="{{ route('competitions.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-50">Retour liste</a>
    </div>

    <section class="max-w-3xl rounded-xl bg-white p-5 shadow">
        <form method="POST" action="{{ route('competitions.store') }}" class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            @csrf

            <div class="sm:col-span-2">
                <label class="mb-1 block text-sm font-medium" for="titre">Titre</label>
                <input id="titre" name="titre" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('titre') }}">
            </div>

            <div class="sm:col-span-2">
                <label class="mb-1 block text-sm font-medium" for="description">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full rounded-lg border border-slate-300 px-3 py-2">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium" for="date_debut">Date debut</label>
                <input id="date_debut" name="date_debut" type="date" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('date_debut') }}">
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium" for="date_fin">Date fin</label>
                <input id="date_fin" name="date_fin" type="date" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('date_fin') }}">
            </div>

            <div class="sm:col-span-2 mt-2">
                <label class="mb-1 block text-sm font-medium text-slate-700">Etudiants participants</label>
                @php
                    $selectedStudentIds = collect(old('students', []))
                        ->map(fn ($id) => (int) $id)
                        ->all();
                @endphp

                <div class="h-48 overflow-y-auto rounded-lg border border-slate-300 bg-slate-50 p-3">
                    @forelse ($students as $student)
                        <label class="flex cursor-pointer items-center rounded p-2 hover:bg-emerald-50">
                            <input type="checkbox" name="students[]" value="{{ $student->id }}" @checked(in_array($student->id, $selectedStudentIds)) class="h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="ml-3 text-sm font-medium text-slate-700">{{ $student->user->nom }} {{ $student->user->prenom }}</span>
                        </label>
                    @empty
                        <p class="p-2 text-sm text-slate-500">Aucun etudiant disponible.</p>
                    @endforelse
                </div>
            </div>

            <div class="sm:col-span-2">
                <button type="submit" class="rounded-lg bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-500">Creer</button>
            </div>
        </form>
    </section>
@endsection
