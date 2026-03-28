@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

    <header class="mb-6 rounded-2xl bg-gradient-to-r from-slate-900 to-slate-700 p-6 text-white shadow-xl">
        <h2 class="text-2xl font-bold">Dashboard Admin</h2>
        <p class="mt-2 text-sm text-slate-200">Espace principal pour gerer utilisateurs et halaqas.</p>
    </header>

    <section class="mb-6 grid gap-4 sm:grid-cols-3">
        <article class="rounded-xl bg-white p-5 shadow">
            <p class="text-sm text-slate-500">Total utilisateurs</p>
            <p class="mt-2 text-3xl font-bold text-slate-900">{{ $usersCount }}</p>
        </article>
        <article class="rounded-xl bg-white p-5 shadow">
            <p class="text-sm text-slate-500">Utilisateurs actifs</p>
            <p class="mt-2 text-3xl font-bold text-emerald-600">{{ $activeUsersCount }}</p>
        </article>
        <article class="rounded-xl bg-white p-5 shadow">
            <p class="text-sm text-slate-500">Total halaqas</p>
            <p class="mt-2 text-3xl font-bold text-fuchsia-600">{{ $halaqasCount }}</p>
        </article>
    </section>

    <section class="grid gap-4 lg:grid-cols-2">
        <a href="{{ route('users.index') }}" class="rounded-xl bg-white p-5 shadow transition hover:-translate-y-0.5 hover:shadow-md">
            <h3 class="text-lg font-semibold">Gestion des utilisateurs</h3>
            <p class="mt-1 text-sm text-slate-500">Lister, chercher, modifier, bloquer/debloquer, supprimer.</p>
        </a>

        <a href="{{ route('users.create') }}" class="rounded-xl bg-white p-5 shadow transition hover:-translate-y-0.5 hover:shadow-md">
            <h3 class="text-lg font-semibold">Creer un utilisateur</h3>
            <p class="mt-1 text-sm text-slate-500">Formulaire dedie pour ajouter un nouveau compte.</p>
        </a>

        <a href="{{ route('halaqas.index') }}" class="rounded-xl bg-white p-5 shadow transition hover:-translate-y-0.5 hover:shadow-md">
            <h3 class="text-lg font-semibold">Liste des halaqas</h3>
            <p class="mt-1 text-sm text-slate-500">Voir toutes les halaqas enregistrees.</p>
        </a>

        <a href="{{ route('halaqas.create') }}" class="rounded-xl bg-white p-5 shadow transition hover:-translate-y-0.5 hover:shadow-md">
            <h3 class="text-lg font-semibold">Creer une halaqa</h3>
            <p class="mt-1 text-sm text-slate-500">Associer une halaqa a un cheikh (user id).</p>
        </a>
    </section>
@endsection
