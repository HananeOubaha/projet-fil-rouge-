<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Ressources</title>
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
                    <a href="index.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Accueil</a>
                    <a href="resources.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Ressources</a>
                    <a href="about.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">À propos</a>
                    <a href="login.html" class="bg-pvn-green text-white hover:bg-pvn-dark-green px-4 py-2 rounded-md text-sm font-medium">Connexion</a>
                    <a href="register.html" class="bg-pvn-dark-green text-white hover:bg-pvn-green px-4 py-2 rounded-md text-sm font-medium">Inscription</a>
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
                <a href="index.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Accueil</a>
                <a href="resources.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Ressources</a>
                <a href="about.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">À propos</a>
                <a href="login.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Connexion</a>
                <a href="register.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Inscription</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-pvn-dark-green mb-4">Ressources bien-être</h1>
            <p class="text-xl text-gray-600">Découvrez notre collection de ressources pour votre développement personnel</p>
        </div>

        <!-- Search and Filters -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <input type="text" placeholder="Rechercher une ressource..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                </div>
                <div>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                        <option value="">Toutes les catégories</option>
                        <option value="meditation">Méditation</option>
                        <option value="stress">Gestion du stress</option>
                        <option value="sleep">Sommeil</option>
                        <option value="anxiety">Anxiété</option>
                    </select>
                </div>
                <div>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                        <option value="">Tous les formats</option>
                        <option value="article">Articles</option>
                        <option value="video">Vidéos</option>
                        <option value="podcast">Podcasts</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Resource of the Day -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-pvn-dark-green">Ressource du jour</h2>
                <span class="bg-pvn-green text-white px-3 py-1 rounded-full text-sm">Nouveau</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Méditation guidée" 
                         class="w-full h-64 object-cover rounded-lg">
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-2">Méditation guidée pour débutants</h3>
                    <p class="text-gray-600 mb-4">Une introduction douce à la pratique de la méditation, parfaite pour les débutants souhaitant découvrir ses bienfaits.</p>
                    <div class="flex items-center space-x-4 mb-4">
                        <span class="flex items-center text-gray-500">
                            <i class="far fa-clock mr-2"></i>
                            15 minutes
                        </span>
                        <span class="flex items-center text-gray-500">
                            <i class="far fa-user mr-2"></i>
                            Par Dr. Marie Lambert
                        </span>
                    </div>
                    <button class="bg-pvn-green text-white px-6 py-2 rounded-md hover:bg-pvn-dark-green">
                        Commencer maintenant
                    </button>
                </div>
            </div>
        </div>

        <!-- Resources Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Resource Card 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Gestion du stress" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">Article</span>
                        <span class="text-gray-500 text-sm">10 min de lecture</span>
                    </div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-2">5 techniques de gestion du stress</h3>
                    <p class="text-gray-600 mb-4">Découvrez des méthodes efficaces pour gérer votre stress au quotidien.</p>
                    <a href="#" class="text-pvn-green hover:text-pvn-dark-green font-medium">Lire plus →</a>
                </div>
            </div>

            <!-- Resource Card 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.unsplash.com/photo-1512438248247-f0f2a5a8b7f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Sommeil réparateur" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">Podcast</span>
                        <span class="text-gray-500 text-sm">20 min</span>
                    </div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-2">Les secrets d'un sommeil réparateur</h3>
                    <p class="text-gray-600 mb-4">Améliorez la qualité de votre sommeil avec ces conseils d'experts.</p>
                    <a href="#" class="text-pvn-green hover:text-pvn-dark-green font-medium">Écouter →</a>
                </div>
            </div>

            <!-- Resource Card 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://images.unsplash.com/photo-1518609878373-06d740f60d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Confiance en soi" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">Vidéo</span>
                        <span class="text-gray-500 text-sm">15 min</span>
                    </div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-2">Développer sa confiance en soi</h3>
                    <p class="text-gray-600 mb-4">Des exercices pratiques pour renforcer votre confiance au quotidien.</p>
                    <a href="#" class="text-pvn-green hover:text-pvn-dark-green font-medium">Regarder →</a>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-8">
            <button class="bg-pvn-green text-white px-8 py-3 rounded-md hover:bg-pvn-dark-green">
                Charger plus de ressources
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-pvn-dark-green text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">À propos de PVN</h3>
                    <p class="text-gray-300">Votre plateforme de bien-être mental et de soutien psychologique.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Accueil</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Ressources</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">À propos</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Ressources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Articles</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Podcasts</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Vidéos</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-facebook text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                    </div>
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