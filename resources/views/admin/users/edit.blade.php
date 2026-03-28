@extends('layouts.admin')

@section('title', 'Modifier Utilisateur')

@section('content')

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold">Modifier utilisateur #{{ $user->id }}</h2>
            <p class="text-sm text-slate-500">Mise a jour des informations.</p>
        </div>
        <a href="{{ route('users.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-50">Retour liste</a>
    </div>

    <section class="max-w-3xl rounded-xl bg-white p-5 shadow">
        <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}" class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-1 block text-sm font-medium" for="nom">Nom</label>
                <input id="nom" name="nom" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('nom', $user->nom) }}">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium" for="prenom">Prenom</label>
                <input id="prenom" name="prenom" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('prenom', $user->prenom) }}">
            </div>
            <div class="sm:col-span-2">
                <label class="mb-1 block text-sm font-medium" for="email">Email</label>
                <input id="email" name="email" type="email" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('email', $user->email) }}">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium" for="password">Nouveau mot de passe (optionnel)</label>
                <input id="password" name="password" type="password" class="w-full rounded-lg border border-slate-300 px-3 py-2">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium" for="password_confirmation">Confirmation</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="w-full rounded-lg border border-slate-300 px-3 py-2">
            </div>
            <div class="sm:col-span-2">
                <label class="mb-1 block text-sm font-medium" for="role">Role</label>
                <select id="role" name="role" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    @foreach (['admin', 'student', 'parent', 'teacher', 'cheikh'] as $role)
                        <option value="{{ $role }}" @selected(old('role', $user->role) === $role)>{{ $role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-2">
                <button type="submit" class="rounded-lg bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-500">Mettre a jour</button>
            </div>
        </form>
    </section>
@endsection
