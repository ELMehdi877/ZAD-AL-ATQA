<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test AdminController</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <header class="mb-8 rounded-2xl bg-gradient-to-r from-slate-900 to-slate-700 p-6 text-white shadow-xl">
            <h1 class="text-2xl font-bold">Page de test AdminController</h1>
            <p class="mt-2 text-sm text-slate-200">Tailwind CSS + JavaScript natif pour tester rapidement les routes users et halaqa.</p>
        </header>

        @if (session('success'))
            <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800">
                <p class="mb-2 font-semibold">Erreurs de validation :</p>
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="mb-6 rounded-xl bg-white p-5 shadow">
            <h2 class="mb-3 text-lg font-semibold">Rechercher un utilisateur</h2>
            <form method="GET" action="{{ route('user.search') }}" class="flex flex-col gap-3 sm:flex-row sm:items-end">
                <div class="w-full sm:max-w-md">
                    <label for="search_nom" class="mb-1 block text-sm font-medium">Nom</label>
                    <input id="search_nom" name="nom" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none ring-0 focus:border-slate-500" placeholder="Ex: Ahmed" value="{{ request('nom') }}">
                </div>
                <button type="submit" class="rounded-lg bg-slate-900 px-4 py-2 font-medium text-white hover:bg-slate-700">Rechercher</button>
                <a href="{{ route('users.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-center font-medium hover:bg-slate-50">Réinitialiser</a>
            </form>
        </section>

        <div class="grid gap-6 lg:grid-cols-2">
            <section class="rounded-xl bg-white p-5 shadow">
                <h2 class="mb-4 text-lg font-semibold">Créer un utilisateur</h2>
                <form method="POST" action="{{ route('user.store') }}" class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    @csrf
                    <div>
                        <label class="mb-1 block text-sm font-medium" for="create_nom">Nom</label>
                        <input id="create_nom" name="nom" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('nom') }}">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium" for="create_prenom">Prénom</label>
                        <input id="create_prenom" name="prenom" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('prenom') }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1 block text-sm font-medium" for="create_email">Email</label>
                        <input id="create_email" name="email" type="email" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('email') }}">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium" for="create_password">Mot de passe</label>
                        <input id="create_password" name="password" type="password" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium" for="create_password_confirmation">Confirmation</label>
                        <input id="create_password_confirmation" name="password_confirmation" type="password" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1 block text-sm font-medium" for="create_role">Role</label>
                        <select id="create_role" name="role" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                            <option value="">-- choisir --</option>
                            @foreach (['admin', 'student', 'parent', 'cheikh'] as $role)
                                <option value="{{ $role }}" @selected(old('role') === $role)>{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <button type="submit" class="w-full rounded-lg bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-500">Créer l'utilisateur</button>
                    </div>
                </form>
            </section>

            <section class="rounded-xl bg-white p-5 shadow">
                <h2 class="mb-2 text-lg font-semibold">Modifier un utilisateur</h2>
                <p class="mb-4 text-sm text-slate-500">Cliquez sur "Remplir" dans le tableau pour précharger ce formulaire.</p>

                <form method="POST" id="update-form" action="{{ route('user.update', ['user' => 0]) }}" class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="mb-1 block text-sm font-medium" for="update_nom">Nom</label>
                        <input id="update_nom" name="nom" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium" for="update_prenom">Prénom</label>
                        <input id="update_prenom" name="prenom" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1 block text-sm font-medium" for="update_email">Email</label>
                        <input id="update_email" name="email" type="email" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium" for="update_password">Nouveau mot de passe (optionnel)</label>
                        <input id="update_password" name="password" type="password" class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium" for="update_password_confirmation">Confirmation</label>
                        <input id="update_password_confirmation" name="password_confirmation" type="password" class="w-full rounded-lg border border-slate-300 px-3 py-2">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1 block text-sm font-medium" for="update_role">Role</label>
                        <select id="update_role" name="role" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                            @foreach (['admin', 'student', 'parent', 'teacher'] as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <button type="submit" class="w-full rounded-lg bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-500">Mettre à jour l'utilisateur</button>
                    </div>
                </form>
            </section>
        </div>

        <section class="mt-6 rounded-xl bg-white p-5 shadow">
            <h2 class="mb-4 text-lg font-semibold">Créer une halaqa</h2>
            <form method="POST" action="{{ route('halaqa.store') }}" class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                @csrf
                <div class="sm:col-span-2">
                    <label class="mb-1 block text-sm font-medium" for="nom_halaqa">Nom halaqa</label>
                    <input id="nom_halaqa" name="nom_halaqa" type="text" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('nom_halaqa') }}">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium" for="capacite">Capacité</label>
                    <input id="capacite" name="capacite" type="number" min="1" required class="w-full rounded-lg border border-slate-300 px-3 py-2" value="{{ old('capacite', 20) }}">
                </div>
                <div class="sm:col-span-3">
                    <label class="mb-1 block text-sm font-medium" for="cheikh_id">Cheikh (user id)</label>
                    <select id="cheikh_id" name="cheikh_id" required class="w-full rounded-lg border border-slate-300 px-3 py-2">
                        <option value="">-- choisir un utilisateur --</option>
                        @if (isset($users) && $users->isEmpty())
                            <option value="" disabled>Aucun utilisateur disponible</option>
                        @elseif (isset($users))
                            @foreach ($users as $u)
                            <option value="{{ $u->id }}" @selected(old('cheikh_id') == $u->id)>
                                #{{ $u->id }} - {{ $u->nom }} {{ $u->prenom }} ({{ $u->role }})
                            </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="sm:col-span-3">
                    <button type="submit" class="rounded-lg bg-fuchsia-600 px-4 py-2 font-medium text-white hover:bg-fuchsia-500">Créer la halaqa</button>
                </div>
            </form>
        </section>

        <section class="mt-6 rounded-xl bg-white p-5 shadow">
            <h2 class="mb-4 text-lg font-semibold">Liste des utilisateurs (test status/suppression/update)</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse text-sm">
                    <thead>
                        <tr class="border-b bg-slate-50 text-left">
                            <th class="px-3 py-2">ID</th>
                            <th class="px-3 py-2">Nom</th>
                            <th class="px-3 py-2">Prénom</th>
                            <th class="px-3 py-2">Email</th>
                            <th class="px-3 py-2">Role</th>
                            <th class="px-3 py-2">Status</th>
                            <th class="px-3 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($users) && $users->isEmpty())
                            <tr>
                                <td colspan="8" class="px-3 py-5 text-center text-slate-500">Aucun utilisateur trouvé.</td>
                            </tr>
                        @elseif (isset($users))
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
                                        <button
                                            type="button"
                                            class="fill-update rounded bg-blue-100 px-2 py-1 font-medium text-blue-700 hover:bg-blue-200"
                                            data-id="{{ $user->id }}"
                                            data-nom="{{ $user->nom }}"
                                            data-prenom="{{ $user->prenom }}"
                                            data-email="{{ $user->email }}"
                                            data-role="{{ $user->role }}"
                                        >
                                            Remplir
                                        </button>

                                        <form method="POST" action="{{ route('user.status', ['id' => $user->id]) }}" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="rounded bg-amber-100 px-2 py-1 font-medium text-amber-800 hover:bg-amber-200">
                                                Basculer status
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('user.delete', ['id' => $user->id]) }}" class="inline delete-form" data-user="{{ $user->nom }} {{ $user->prenom }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded bg-rose-100 px-2 py-1 font-medium text-rose-700 hover:bg-rose-200">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-3 py-5 text-center text-slate-500">Aucun utilisateur trouvé.</td>
                            </tr>
                        @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script>
        const updateForm = document.getElementById('update-form');
        const updateBaseAction = updateForm.action;

        document.querySelectorAll('.fill-update').forEach((button) => {
            button.addEventListener('click', () => {
                const userId = button.dataset.id;

                updateForm.action = updateBaseAction.replace(/0$/, userId);
                document.getElementById('update_nom').value = button.dataset.nom;
                document.getElementById('update_prenom').value = button.dataset.prenom;
                document.getElementById('update_email').value = button.dataset.email;
                document.getElementById('update_role').value = button.dataset.role;
                document.getElementById('update_password').value = '';
                document.getElementById('update_password_confirmation').value = '';

                updateForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });
        });

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
</body>
</html>
