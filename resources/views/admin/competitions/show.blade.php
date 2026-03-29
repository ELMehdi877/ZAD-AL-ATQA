@extends('layouts.admin')

@section('title', 'Detail Competition')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold">Competition #{{ $competition->id }}</h2>
            <p class="text-sm text-slate-500">Details et participants de la competition.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('competitions.edit', ['competition' => $competition->id]) }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-50">Modifier</a>
            <a href="{{ route('competitions.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-50">Retour liste</a>
        </div>
    </div>

    <section class="mb-6 rounded-xl bg-white p-5 shadow">
        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-xs uppercase tracking-wide text-slate-500">Titre</dt>
                <dd class="mt-1 text-sm font-medium text-slate-900">{{ $competition->titre }}</dd>
            </div>
            <div>
                <dt class="text-xs uppercase tracking-wide text-slate-500">Periode</dt>
                <dd class="mt-1 text-sm font-medium text-slate-900">{{ $competition->date_debut }} - {{ $competition->date_fin }}</dd>
            </div>
            <div class="sm:col-span-2">
                <dt class="text-xs uppercase tracking-wide text-slate-500">Description</dt>
                <dd class="mt-1 text-sm text-slate-700">{{ $competition->description ?: 'Aucune description.' }}</dd>
            </div>
        </dl>
    </section>

    <section class="rounded-xl bg-white p-5 shadow">
        <h3 class="mb-3 text-lg font-semibold">Etudiants participants ({{ $competition->students->count() }})</h3>

        <div class="overflow-hidden rounded-lg border border-slate-200">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Nom</th>
                        <th class="px-4 py-3 text-left">Prenom</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($competition->students as $student)
                        <tr class="border-t border-slate-100">
                            <td class="px-4 py-3">{{ $student->id }}</td>
                            <td class="px-4 py-3">{{ $student->user->nom ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $student->user->prenom ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-6 text-center text-slate-500">Aucun participant pour cette competition.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
