<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - À propos</title>
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

    <!-- Hero Section -->
    <div class="bg-pvn-light-beige py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-pvn-dark-green mb-4">Notre Mission</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Positive Vibes Network est né d'une vision simple : rendre le soutien psychologique accessible à tous, 
                    dans un environnement bienveillant et professionnel.
                </p>
            </div>
        </div>
    </div>

    <!-- Nos Valeurs -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-pvn-dark-green text-center mb-12">Nos Valeurs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="text-pvn-green text-4xl mb-4">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-2">Bienveillance</h3>
                    <p class="text-gray-600">Un espace sûr où chacun peut s'exprimer librement, sans jugement.</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-pvn-green text-4xl mb-4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-2">Professionnalisme</h3>
                    <p class="text-gray-600">Des psychologues certifiés et une approche rigoureuse du bien-être mental.</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-pvn-green text-4xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-2">Communauté</h3>
                    <p class="text-gray-600">Une communauté solidaire qui s'entraide et se soutient mutuellement.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Notre Histoire -->
    <div class="py-16 bg-pvn-light-beige">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Notre équipe" 
                         class="rounded-lg shadow-lg">
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-pvn-dark-green mb-6">Notre Histoire</h2>
                    <p class="text-gray-600 mb-4">
                        Fondé en 2025, PVN est né de la volonté de créer un espace en ligne où le bien-être mental 
                        serait accessible à tous. Notre équipe de professionnels passionnés travaille chaque jour 
                        pour faire de cette vision une réalité.
                    </p>
                    <p class="text-gray-600">
                        Aujourd'hui, nous sommes fiers d'avoir aidé des milliers de personnes à trouver leur chemin 
                        vers un meilleur équilibre mental et émotionnel.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Témoignages -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-pvn-dark-green text-center mb-12">Témoignages</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-pvn-light-beige p-6 rounded-lg shadow-lg">
                    <div class="text-pvn-green text-2xl mb-4">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="text-gray-600 mb-4">
                        "PVN m'a aidé à traverser une période difficile de ma vie. Le soutien de la communauté 
                        et les conseils professionnels ont fait une réelle différence."
                    </p>
                    <p class="font-semibold text-pvn-dark-green">- Marie D.</p>
                </div>
                <div class="bg-pvn-light-beige p-6 rounded-lg shadow-lg">
                    <div class="text-pvn-green text-2xl mb-4">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="text-gray-600 mb-4">
                        "En tant que psychologue sur PVN, je suis impressionné par l'engagement de la plateforme 
                        envers le bien-être mental et la qualité du soutien offert."
                    </p>
                    <p class="font-semibold text-pvn-dark-green">- Dr. Thomas B.</p>
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