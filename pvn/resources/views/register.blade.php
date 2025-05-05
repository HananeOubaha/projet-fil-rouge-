<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'pvn-beige': '#F5F0E8',
                        'pvn-green': '#7C9A92',
                        'pvn-dark-green': '#557571',
                        'pvn-light-beige': '#FAF6F0'
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-pvn-beige min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="index.html" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="/" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Accueil</a>
                    <a href="/resources" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Ressources</a>
                    <a href="/about" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">À propos</a>
                    <a href="/login" class="bg-pvn-green text-white hover:bg-pvn-dark-green px-4 py-2 rounded-md text-sm font-medium">Connexion</a>
                    <a href="/register" class="bg-pvn-dark-green text-white hover:bg-pvn-green px-4 py-2 rounded-md text-sm font-medium">Inscription</a>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-pvn-dark-green hover:text-pvn-green">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Accueil</a>
                <a href="/resources" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Ressources</a>
                <a href="/about" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">À propos</a>
                <a href="/login" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Connexion</a>
                <a href="/register" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Inscription</a>
            </div>
        </div>
    </nav>

    <!-- Registration Form -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
            <div class="text-center">
                <i class="fas fa-user-plus text-pvn-green text-4xl mb-4"></i>
                <h2 class="text-3xl font-bold text-pvn-dark-green">Inscription</h2>
                <p class="mt-2 text-gray-600">Rejoignez la communauté PVN</p>
            </div>

            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700">Je souhaite m'inscrire en tant que</label>
                        <select id="role" name="role" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pvn-green focus:border-pvn-green">
                            <option value="patient">Patient</option>
                            <option value="psychologue">Psychologue</option>
                        </select>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                        <input id="name" name="name" type="text" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pvn-green focus:border-pvn-green @error('name') border-red-500 @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                        <input id="email" name="email" type="email" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pvn-green focus:border-pvn-green @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input id="password" name="password" type="password" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pvn-green focus:border-pvn-green @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pvn-green focus:border-pvn-green">
                    </div>

                    <!-- <div id="psychologue-fields" class="hidden space-y-4">
                        <div>
                            <label for="license" class="block text-sm font-medium text-gray-700">Numéro de licence professionnelle</label>
                            <input id="license" name="license" type="text" 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pvn-green focus:border-pvn-green">
                        </div>
                        <div>
                            <label for="specialization" class="block text-sm font-medium text-gray-700">Spécialisation</label>
                            <input id="specialization" name="specialization" type="text" 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pvn-green focus:border-pvn-green">
                        </div>
                    </div>  -->
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-pvn-green focus:ring-pvn-green border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        J'accepte les <a href="#" class="text-pvn-green hover:text-pvn-dark-green">conditions d'utilisation</a>
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-pvn-green hover:bg-pvn-dark-green focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pvn-green">
                        Créer mon compte
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Déjà inscrit ?
                    <a href="{{ route('login') }}" class="font-medium text-pvn-green hover:text-pvn-dark-green">
                        Connectez-vous
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-pvn-dark-green text-white mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center">
                <p class="text-gray-300">&copy; 2025 Positive Vibes Network. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Toggle psychologue fields visibility
        const roleSelect = document.getElementById('role');
        const psychologueFields = document.getElementById('psychologue-fields');

        roleSelect.addEventListener('change', (e) => {
            if (e.target.value === 'psychologue') {
                psychologueFields.classList.remove('hidden');
            } else {
                psychologueFields.classList.add('hidden');
            }
        });
    </script>
</body>
</html>