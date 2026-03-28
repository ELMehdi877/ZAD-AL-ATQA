@extends('layouts.admin')

@section('title', 'Utilisateurs')

@section('content')

    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h2 class="text-2xl font-bold">Utilisateurs</h2>
            <p class="text-sm text-slate-500">Gestion complete des comptes.</p>
        </div>
        <a href="{{ route('users.create') }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Nouveau utilisateur</a>
    </div>

    <section class="mb-6 rounded-xl bg-white p-4 shadow">
        <form method="GET" action="{{ route('user.search') }}" class="flex flex-col gap-3 sm:flex-row sm:items-end">
            <div class="w-full sm:max-w-md">
                <label for="nom" class="mb-1 block text-sm font-medium">Recherche par nom</label>
                <input id="nom" name="nom" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ request('nom') }}" placeholder="Ex: Ahmed">
            </div>
            <button type="submit" class="rounded-lg bg-slate-900 px-4 py-2 font-medium text-white hover:bg-slate-700">Rechercher</button>
            <a href="{{ route('users.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-center font-medium hover:bg-slate-50">Reset</a>
        </form>
    </section>

    <section class="overflow-x-auto rounded-xl bg-white shadow">
        <table class="min-w-full border-collapse text-sm">
            <thead>
                <tr class="border-b bg-slate-50 text-left">
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Nom</th>
                    <th class="px-3 py-2">Prenom</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">Role</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b hover:bg-slate-50">
                        <td class="px-3 py-2">{{ $user->id }}</td>
                        <td class="px-3 py-2">{{ $user->nom }}</td>
                        <td class="px-3 py-2">{{ $user->prenom }}</td>
                        <td class="px-3 py-2">{{ $user->email }}</td>
                        <td class="px-3 py-2">{{ $user->role }}</td>
                        <td class="px-3 py-2">
                            <span class="rounded-full px-2 py-1 text-xs {{ $user->status === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' }}">
                                {{ $user->status }}
                            </span>
                        </td>
                        <td class="px-3 py-2">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="rounded bg-blue-100 px-2 py-1 font-medium text-blue-700 hover:bg-blue-200">Modifier</a>

                                <form method="POST" action="{{ route('user.status', ['id' => $user->id]) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="rounded bg-amber-100 px-2 py-1 font-medium text-amber-800 hover:bg-amber-200">Status</button>
                                </form>

                                <form method="POST" action="{{ route('user.delete', ['id' => $user->id]) }}" class="inline delete-form" data-user="{{ $user->nom }} {{ $user->prenom }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded bg-rose-100 px-2 py-1 font-medium text-rose-700 hover:bg-rose-200">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-3 py-5 text-center text-slate-500">Aucun utilisateur trouve.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.delete-form').forEach((form) => {
            form.addEventListener('submit', (event) => {
                const userName = form.dataset.user || 'cet utilisateur';
                const ok = window.confirm(`Supprimer ${userName} ?`);
                if (!ok) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
