<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Positive Vibes Network - Accueil</title>
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
                        <span class="text-pvn-dark-green font-semibold text-xl">Phosphenes</span>
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

    <!-- Hero Section -->
    <div class="relative bg-pvn-light-beige">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-4xl tracking-tight font-extrabold text-pvn-dark-green sm:text-5xl md:text-6xl">
                    <span class="block">Bienvenue sur</span>
                    <span class="block text-pvn-green">Positive Vibes Network</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-600 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Votre espace de bien-être mental et de soutien psychologique. Rejoignez notre communauté bienveillante.
                </p>
                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    <div class="rounded-md shadow">
                        <a href="register.html" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-pvn-green hover:bg-pvn-dark-green md:py-4 md:text-lg md:px-10">
                            Commencer
                        </a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="about.html" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-pvn-dark-green bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                            En savoir plus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Citation du jour -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-pvn-dark-green">Citation inspirante du jour</h2>
                <div class="mt-6 bg-pvn-light-beige p-8 rounded-lg shadow-lg">
                    <p class="text-xl italic text-gray-700">"La paix intérieure commence le jour où vous choisissez de ne pas laisser un autre événement ou personne contrôler vos émotions."</p>
                    <p class="mt-4 text-pvn-green font-semibold">- Unknown</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="bg-pvn-green py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <div class="text-center">
                    <div class="text-4xl font-bold text-white">1,234+</div>
                    <div class="mt-2 text-xl text-white">Membres actifs</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-white">50+</div>
                    <div class="mt-2 text-xl text-white">Psychologues certifiés</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-white">5,000+</div>
                    <div class="mt-2 text-xl text-white">Vies impactées</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Derniers Articles -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-pvn-dark-green text-center mb-12">Derniers Articles</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <div class="bg-pvn-light-beige rounded-lg overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" 
                         alt="Méditation" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-pvn-dark-green">Guide de méditation pour débutants</h3>
                        <p class="mt-2 text-gray-600">Découvrez les bases de la méditation et comment l'intégrer dans votre quotidien.</p>
                        <a href="#" class="mt-4 inline-block text-pvn-green hover:text-pvn-dark-green">Lire plus →</a>
                    </div>
                </div>
                <div class="bg-pvn-light-beige rounded-lg overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" 
                         alt="Gestion du stress" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-pvn-dark-green">5 techniques de gestion du stress</h3>
                        <p class="mt-2 text-gray-600">Des méthodes pratiques pour gérer le stress au quotidien.</p>
                        <a href="#" class="mt-4 inline-block text-pvn-green hover:text-pvn-dark-green">Lire plus →</a>
                    </div>
                </div>
                <div class="bg-pvn-light-beige rounded-lg overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" 
                         alt="Bien-être" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-pvn-dark-green">L'importance du sommeil</h3>
                        <p class="mt-2 text-gray-600">Comment améliorer la qualité de votre sommeil pour un meilleur bien-être.</p>
                        <a href="#" class="mt-4 inline-block text-pvn-green hover:text-pvn-dark-green">Lire plus →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-pvn-dark-green text-white">
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