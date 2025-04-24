@extends('layout.app')
@section('title', 'Home')

@section('content')

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
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
@endsection