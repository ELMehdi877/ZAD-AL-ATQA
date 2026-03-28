@extends('layouts.admin')

@section('title', 'Liste Halaqas')

@section('content')

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold">Halaqas</h2>
            <p class="text-sm text-slate-500">Liste complete des halaqas.</p>
        </div>
        <a href="{{ route('halaqas.create') }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Nouvelle halaqa</a>
    </div>

    <section class="overflow-hidden rounded-xl bg-white shadow">
        <table class="min-w-full border-collapse text-sm">
            <thead>
                <tr class="border-b bg-slate-50 text-left">
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Nom halaqa</th>
                    <th class="px-3 py-2">Capacite</th>
                    <th class="px-3 py-2">Cheikh ID</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($halaqas as $halaqa)
                    <tr class="border-b hover:bg-slate-50">
                        <td class="px-3 py-2">{{ $halaqa->id }}</td>
                        <td class="px-3 py-2">{{ $halaqa->nom_halaqa }}</td>
                        <td class="px-3 py-2">{{ $halaqa->capacite }}</td>
                        <td class="px-3 py-2">{{ $halaqa->cheikh_id }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-3 py-6 text-center text-slate-500">Aucune halaqa trouvee.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
