@extends('layout.app')
@section('title', 'Home')

@section('content')
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

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    @endsection