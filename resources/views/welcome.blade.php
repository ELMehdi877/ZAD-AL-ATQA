<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LINKUP | Connectez-vous à votre communauté</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f3f4f9; /* Gris très clair comme le fond de l'image */
        }

        /* --- ANIMATIONS --- */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-float { animation: float 5s ease-in-out infinite; }
        .animate-scale { animation: scaleIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        /* --- STYLES INSPIRÉS DE L'IMAGE --- */
        .rounded-custom { border-radius: 40px; } /* Coins très arrondis comme sur l'image */
        .btn-black { 
            background-color: #111111; 
            color: white;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .btn-black:hover { transform: scale(1.05); background-color: #000; }
        
        .card-shadow {
            box-shadow: 0 10px 40px -10px rgba(0,0,0,0.05);
        }

        .bg-mesh {
            background: radial-gradient(at 0% 0%, rgba(199, 210, 254, 0.5) 0, transparent 50%), 
                        radial-gradient(at 100% 100%, rgba(254, 202, 202, 0.3) 0, transparent 50%);
        }
    </style>
</head>
<body class="bg-mesh min-h-screen overflow-x-hidden">

    <!-- Navbar Minimaliste -->
    <nav class="flex justify-between items-center px-10 py-8 max-w-7xl mx-auto">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-[#111] rounded-2xl flex items-center justify-center shadow-lg">
                <span class="text-white font-bold text-xl">L</span>
            </div>
            <span class="text-2xl font-extrabold tracking-tight text-gray-900">LINKUP</span>
        </div>
        <div class="flex gap-4">
            <a href="{{ url('/login') }}" class="px-6 py-3 font-bold text-gray-600 hover:text-black transition">Connexion</a>
            <a href="{{ url('/register') }}" class="btn-black px-8 py-3 font-bold shadow-xl shadow-gray-200">
                S'inscrire
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="max-w-7xl mx-auto px-10 py-12 grid lg:grid-cols-2 gap-20 items-center">
        
        <div class="animate-scale">
            <h1 class="text-6xl md:text-7xl font-[800] text-gray-900 leading-tight tracking-tighter mb-8">
                L'endroit où les <span class="text-blue-500 underline decoration-4 underline-offset-8">idées</span> se rencontrent.
            </h1>
            <p class="text-xl text-gray-500 leading-relaxed mb-10 max-w-md">
                Rejoignez la nouvelle expérience sociale. Simple, élégante et conçue pour vous connecter au reste du monde.
            </p>
            <div class="flex gap-4 items-center">
                <a href="{{ url('/register') }}" class="btn-black px-10 py-5 text-lg font-bold">Commencer l'aventure</a>
                <div class="flex -space-x-3">
                    <img class="w-10 h-10 rounded-full border-4 border-white" src="https://i.pravatar.cc/100?u=1" />
                    <img class="w-10 h-10 rounded-full border-4 border-white" src="https://i.pravatar.cc/100?u=2" />
                    <img class="w-10 h-10 rounded-full border-4 border-white" src="https://i.pravatar.cc/100?u=3" />
                </div>
            </div>
        </div>

        <!-- Visuel Inspiré de l'image intérieure -->
        <div class="relative animate-float">
            <!-- Arrière-plan décoratif -->
            <div class="absolute inset-0 bg-blue-100 rounded-[60px] blur-3xl opacity-30"></div>
            
            <!-- Carte Factice Dashboard (Inspirée de votre image) -->
            <div class="relative bg-white p-8 rounded-custom card-shadow border border-gray-100">
                <!-- Header Card -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center">
                            <img src="https://i.pravatar.cc/150?u=8" class="rounded-full w-10 h-10" />
                        </div>
                        <div>
                            <div class="h-3 w-24 bg-gray-200 rounded-full mb-2"></div>
                            <div class="h-2 w-16 bg-gray-100 rounded-full"></div>
                        </div>
                    </div>
                    <div class="w-8 h-8 bg-gray-50 rounded-full flex items-center justify-center text-gray-300">...</div>
                </div>

                <!-- Content Card (Montagnes/Images) -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="h-48 bg-blue-50 rounded-[30px] flex items-center justify-center text-blue-300 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=400" class="w-full h-full object-cover" />
                    </div>
                    <div class="h-48 bg-yellow-50 rounded-[30px] flex items-center justify-center text-yellow-300 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400" class="w-full h-full object-cover" />
                    </div>
                </div>

                <!-- Reaction Floating (le bouton Woow!! de l'image) -->
                <div class="absolute -bottom-6 -right-6 bg-[#ff6b81] text-white px-6 py-3 rounded-full font-bold shadow-xl shadow-red-200 flex items-center gap-2 animate-bounce">
                    🔥 Woow!!
                </div>
                
                <!-- Sidebar miniature teaser -->
                <div class="mt-4 flex gap-3 opacity-40">
                    <div class="h-8 w-8 bg-black rounded-lg"></div>
                    <div class="h-8 w-24 bg-gray-100 rounded-lg"></div>
                </div>
            </div>

            <!-- Petites suggestions flottantes -->
            <div class="absolute -left-10 top-1/2 bg-white p-4 rounded-[25px] shadow-lg flex items-center gap-3 border border-gray-50 animate-scale delay-500">
                <div class="w-8 h-8 bg-purple-100 rounded-full"></div>
                <div class="h-2 w-16 bg-gray-200 rounded-full"></div>
            </div>
        </div>
    </main>

    <!-- Section Features (Bas de page) -->
    <section class="max-w-7xl mx-auto px-10 py-24">
        <div class="grid md:grid-cols-3 gap-12">
            <div class="p-8 bg-white/50 rounded-custom border border-white/80 hover:bg-white transition">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6">🔍</div>
                <h3 class="text-xl font-bold mb-4">Recherche Intelligente</h3>
                <p class="text-gray-500">Trouvez vos amis en un clic grâce à notre système de recherche par pseudo unique ou email.</p>
            </div>
            <div class="p-8 bg-white/50 rounded-custom border border-white/80 hover:bg-white transition">
                <div class="w-14 h-14 bg-yellow-100 text-yellow-600 rounded-2xl flex items-center justify-center text-2xl mb-6">👤</div>
                <h3 class="text-xl font-bold mb-4">Profil Sur-Mesure</h3>
                <p class="text-gray-500">Personnalisez votre bio, votre photo de profil et vos informations pour briller dans la communauté.</p>
            </div>
            <div class="p-8 bg-white/50 rounded-custom border border-white/80 hover:bg-white transition">
                <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-2xl mb-6">🔒</div>
                <h3 class="text-xl font-bold mb-4">Espace Sécurisé</h3>
                <p class="text-gray-500">Une authentification robuste développée nativement pour protéger vos données les plus précieuses.</p>
            </div>
        </div>
    </section>

    <footer class="text-center py-10 text-gray-400 font-medium">
        &copy; {{ date('Y') }} LINKUP STARTUP • Design Moderne & Propre
    </footer>

</body>
</html>