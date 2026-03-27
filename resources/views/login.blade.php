<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-6 rounded shadow w-full max-w-md">

        <h2 class="text-2xl font-bold mb-4 text-center">Connexion</h2>

        {{-- Message erreur --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-3">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('user.login') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="block font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block font-medium">Mot de passe</label>
                <input type="password" name="password"
                       class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember me -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" class="mr-2">
                <label>Se souvenir de moi</label>
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                Se connecter
            </button>
        </form>

    </div>

</body>
</html>