<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Phosphenes - Connexion</title>
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
                    <a href="{{ url('/') }}" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="/" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Accueil</a>
                    <a href="/ressource" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Ressources</a>
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
                <a href="/index" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Accueil</a>
                <a href="/ressource" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Ressources</a>
                <a href="/about" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">À propos</a>
                <a href="/login" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Connexion</a>
                <a href="/register" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Inscription</a>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
            <div class="text-center">
                <i class="fas fa-heart text-pvn-green text-4xl mb-4"></i>
                <h2 class="text-3xl font-bold text-pvn-dark-green">Connexion</h2>
                <p class="mt-2 text-gray-600">Bienvenue sur Positive Vibes Network</p>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">
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
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                            class="h-4 w-4 text-pvn-green focus:ring-pvn-green border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Se souvenir de moi
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-pvn-green hover:text-pvn-dark-green">
                            Mot de passe oublié ?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-pvn-green hover:bg-pvn-dark-green focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pvn-green">
                        Se connecter
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}" class="font-medium text-pvn-green hover:text-pvn-dark-green">
                        Inscrivez-vous
                    </a>
                </p>
            </div>
        </div>
    </div>

     <!-- Footer -->
     <footer class="bg-pvn-dark-green text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <h3 class="text-xl font-semibold"></h3>
                    </div>
                    <p class="text-gray-300 mb-4">Votre plateforme de bien-être mental et de soutien psychologique.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white social-icon">
                            <i class="fab fa-facebook text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white social-icon">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white social-icon">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white social-icon">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pvn-green"></i> Accueil</a></li>
                        <li><a href="/ressource" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pvn-green"></i> Ressources</a></li>
                        <li><a href="/about" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pvn-green"></i> À propos</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pvn-green"></i> Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Ressources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pvn-green"></i> Articles</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pvn-green"></i> Podcasts</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pvn-green"></i> Vidéos</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pvn-green"></i> FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Contact</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-pvn-green"></i>
                            <span>Had soualem .Maroc</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-pvn-green"></i>
                            <a href="mailto:contact@pvn.com" class="hover:underline">hananem140@gmail.com</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-pvn-green"></i>
                            <span>0632333724</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center">
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
    </script>
</body>
</html>