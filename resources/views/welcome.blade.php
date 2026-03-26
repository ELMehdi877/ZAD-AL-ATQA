<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <h2>Créer un utilisateur</h2>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <!-- Nom -->
        <div>
            <label>Nom :</label>
            <input type="text" name="nom" >
            @error('nom')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <!-- Prénom -->
        <div>
            <label>Prénom :</label>
            <input type="text" name="prenom" >
            @error('prenom')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label>Email :</label>
            <input type="email" name="email">
            @error('email')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label>Mot de passe :</label>
            <input type="password" name="password">
            @error('password')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label>Confirmer mot de passe :</label>
            <input type="password" name="password_confirmation">
        </div>

        <!-- Role -->
        <div>
            <label>Rôle :</label>
            <select name="role">
                <option value="">-- Choisir --</option>
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="parent">Parent</option>
                <option value="teacher">Teacher</option>
            </select>
            @error('role')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit" class="p-2 border border-2">Envoyer</button>
    </form>

    <h2>Résultat</h2>
    <form action="{{ route('users.index') }}" method="GET">
        <button type="submit" class="p-2 border border-2">afficher les utilisateurs</button>
    </form>

    {{-- Message de succès --}}
    @if(session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <br>

    {{-- Affichage du user --}}
    @if(session('user'))
        <div style="border:1px solid #ccc; padding:10px; width:300px;">
            <p><strong>Nom :</strong> {{ session('user')->nom }}</p>
            <p><strong>Prénom :</strong> {{ session('user')->prenom }}</p>
            <p><strong>Email :</strong> {{ session('user')->email }}</p>
            <p><strong>Rôle :</strong> {{ session('user')->role }}</p>
        </div>
    @endif

    {{-- Affichage des users --}}
    @if($users->count())
        @foreach($users as $user)

            <form action="{{ route('user.status', $user->id) }}" method="GET">
                <button type="submit" class="p-2 border border-2"> {{ $user->status}}</button>
            </form>

            <form action="{{ route('user.update', $user->id) }}" method="POST" class="flex flex-col" style="border:1px solid #ccc; padding:10px; width:300px;">

                @csrf
                @method ('PUT')

                <label for="nom">Nom</label>
                <input type="text" name="nom" value="{{ $user->nom }}">

                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" value="{{ $user->prenom }}">

                <label for="email">Email</label>
                <input type="text" name="email" value="{{ $user->email }}">

                <label>Rôle :</label>
                <select name="role">
                    <option value="{{ $user->role }}">{{ $user->role }}</option>
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
                    <option value="parent">Parent</option>
                    <option value="teacher">Teacher</option>
                </select>

                <input type="password" name="password">
                <input type="password" name="password_confirmation">

                <button type="submit" class="p-2 border border-2"> update</button>
            </form>
        @endforeach
    @else
        <p>Aucun utilisateur trouvé.</p>
    @endif

</body>
</html>