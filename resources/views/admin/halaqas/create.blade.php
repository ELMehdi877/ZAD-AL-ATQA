@extends('layouts.admin')

@section('title', 'Creer Halaqa')

@section('content')

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold">Creer une halaqa</h2>
            <p class="text-sm text-slate-500">Associer une halaqa a un cheikh.</p>
        </div>
        <a href="{{ route('halaqas.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-50">Retour liste</a>
    </div>

    <section class="max-w-3xl rounded-xl bg-white p-5 shadow">
        <form method="POST" action="{{ route('halaqa.store') }}" class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            @csrf
            <div class="sm:col-span-2">
                <label class="mb-1 block text-sm font-medium" for="nom_halaqa">Nom halaqa</label>
                <input id="nom_halaqa" name="nom_halaqa" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('nom_halaqa') }}">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium" for="capacite">Capacite</label>
                <input id="capacite" name="capacite" type="number" min="1" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('capacite', 20) }}">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium" for="cheikh_id">Cheikh (user id)</label>
                <select id="cheikh_id" name="cheikh_id" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    <option value="">-- choisir --</option>
                    @forelse ($users as $u)
                        <option value="{{ $u->id }}" @selected(old('cheikh_id') == $u->id)>#{{ $u->id }} - {{ $u->nom }} {{ $u->prenom }} ({{ $u->role }})</option>
                    @empty
                        <option value="" disabled>Aucun utilisateur disponible</option>
                    @endforelse
                </select>
            </div>
            <div class="sm:col-span-2">
                <button type="submit" class="rounded-lg bg-fuchsia-600 px-4 py-2 font-medium text-white hover:bg-fuchsia-500">Creer la halaqa</button>
            </div>
        </form>
    </section>
@endsection
