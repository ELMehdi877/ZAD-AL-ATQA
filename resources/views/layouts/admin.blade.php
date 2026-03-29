<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="min-h-screen lg:grid lg:grid-cols-[260px_1fr]">
        <aside class="flex min-h-screen flex-col bg-slate-900 text-white">
            <div class="border-b border-slate-800 px-6 py-5">
                <p class="text-xs uppercase tracking-wider text-slate-400">Zad Al Atqa</p>
                <h1 class="mt-1 text-xl font-bold">Admin Panel</h1>
            </div>

            <nav class="space-y-1 px-3 py-4">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-800">Dashboard</a>
                <a href="{{ route('users.index') }}" class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-800">Utilisateurs</a>
                <a href="{{ route('users.create') }}" class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-800">Nouveau utilisateur</a>
                <a href="{{ route('halaqas.index') }}" class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-800">Halaqas</a>
                <a href="{{ route('halaqas.create') }}" class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-800">Nouvelle halaqa</a>
            </nav>

            <div class="mt-auto border-t border-slate-800 px-3 py-4">
                <p class="mb-2 px-3 text-xs text-slate-400">
                    Connecte: {{ auth()->user()->nom ?? auth()->user()->email }}
                </p>

                <a href="{{ route('profile.edit') }}" class="mb-2 block rounded-lg bg-slate-800 px-3 py-2 text-sm hover:bg-slate-700">
                    Modifier profil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full rounded-lg bg-rose-600 px-3 py-2 text-left text-sm text-white hover:bg-rose-500">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="px-4 py-6 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800">
                    <p class="mb-1 font-semibold">Erreurs de validation :</p>
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
