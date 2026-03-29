@extends('layouts.admin')

@section('title', 'Competitions')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold">Liste des competitions</h2>
            <p class="text-sm text-slate-500">Gestion des competitions.</p>
        </div>
        <a href="{{ route('competitions.create') }}" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-500">Nouvelle competition</a>
    </div>

    <section class="overflow-hidden rounded-xl bg-white shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Titre</th>
                        <th class="px-4 py-3 text-left">Debut</th>
                        <th class="px-4 py-3 text-left">Fin</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($competitions as $competition)
                        <tr class="border-t border-slate-100">
                            <td class="px-4 py-3">{{ $competition->id }}</td>
                            <td class="px-4 py-3">{{ $competition->titre }}</td>
                            <td class="px-4 py-3">{{ $competition->date_debut }}</td>
                            <td class="px-4 py-3">{{ $competition->date_fin }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('competitions.show', ['competition' => $competition->id]) }}" class="rounded-md border border-emerald-300 px-3 py-1.5 text-emerald-700 hover:bg-emerald-50">Voir</a>
                                    <a href="{{ route('competitions.edit', ['competition' => $competition->id]) }}" class="rounded-md border border-slate-300 px-3 py-1.5 hover:bg-slate-50">Modifier</a>
                                    <form method="POST" action="{{ route('competitions.destroy', ['competition' => $competition->id]) }}" onsubmit="return confirm('Supprimer cette competition ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md border border-red-300 px-3 py-1.5 text-red-600 hover:bg-red-50">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-slate-500">Aucune competition trouvee.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
