@extends('layout.app')
@section('title', 'Home')

@section('content')
    <!-- Hero Section-->
    <div class="relative bg-pvn-light-beige overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative z-10 pt-16 pb-20 sm:pt-24 sm:pb-24 lg:pt-32 lg:pb-32">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-extrabold text-pvn-dark-green sm:text-5xl md:text-6xl">
                        <span class="block animate-fade-in-up">Bienvenue sur</span>
                        <span class="block text-pvn-green mt-2 animate-fade-in-up animation-delay-300">Positive Vibes Network</span>
                    </h1>
                    <p class="mt-6 max-w-md mx-auto text-base text-gray-600 sm:text-lg md:mt-8 md:text-xl md:max-w-3xl animate-fade-in-up animation-delay-600">
                        Votre espace de bien-être mental et de soutien psychologique. Rejoignez notre communauté bienveillante.
                    </p>
                    <div class="mt-8 max-w-md mx-auto sm:flex sm:justify-center md:mt-10 animate-fade-in-up animation-delay-900">
                        <div class="rounded-md shadow">
                            <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-pvn-green hover:bg-pvn-dark-green transition-colors duration-300 md:py-4 md:text-lg md:px-10">
                                Commencer
                            </a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="{{ route('about') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-pvn-dark-green bg-white hover:bg-gray-50 transition-colors duration-300 md:py-4 md:text-lg md:px-10">
                                En savoir plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Citation du jour avec design amélioré -->
    <div class="bg-white py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-pvn-dark-green inline-block relative">
                    Citation inspirante du jour
                    <span class="absolute bottom-0 left-0 w-full h-1 bg-pvn-green transform scale-x-0 group-hover:scale-x-100 transition-transform origin-bottom-left"></span>
                </h2>
                <div class="mt-10 bg-pvn-light-beige p-8 md:p-10 rounded-xl shadow-xl transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="relative">
                        <svg class="absolute top-0 left-0 w-12 h-12 text-pvn-green opacity-20 transform -translate-x-6 -translate-y-6" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                        <p class="text-xl md:text-2xl italic text-gray-700 leading-relaxed">
                            "La paix intérieure commence le jour où vous choisissez de ne pas laisser un autre événement ou personne contrôler vos émotions."
                        </p>
                        <svg class="absolute bottom-0 right-0 w-12 h-12 text-pvn-green opacity-20 transform translate-x-6 translate-y-6" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                    </div>
                    <p class="mt-6 text-pvn-green font-semibold">- Unknown</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="bg-pvn-green py-20 relative overflow-hidden">
        <!-- Motif décoratif -->
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="10" cy="10" r="2" fill="white" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#dots)" />
            </svg>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 gap-12 md:grid-cols-3">
                <div class="text-center transform transition-all duration-500 hover:scale-105">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white bg-opacity-20 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-white">1,234+</div>
                    <div class="mt-2 text-xl text-white opacity-90">Membres actifs</div>
                </div>
                <div class="text-center transform transition-all duration-500 hover:scale-105">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white bg-opacity-20 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-white">50+</div>
                    <div class="mt-2 text-xl text-white opacity-90">Psychologues certifiés</div>
                </div>
                <div class="text-center transform transition-all duration-500 hover:scale-105">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white bg-opacity-20 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-white">5,000+</div>
                    <div class="mt-2 text-xl text-white opacity-90">Vies impactées</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Derniers Articles avec design amélioré et effets de hover -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-pvn-dark-green inline-block relative">
                    Derniers Articles
                    <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-pvn-green"></div>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
                <!-- Article 1 -->
                <div class="bg-pvn-light-beige rounded-xl overflow-hidden shadow-lg group transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-2">
                    <div class="relative overflow-hidden h-56">
                        <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" 
                             alt="Méditation" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white text-pvn-dark-green">
                                Bien-être
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>12 Mai 2023</span>
                        </div>
                        <h3 class="text-xl font-semibold text-pvn-dark-green mb-3 group-hover:text-pvn-green transition-colors duration-300">Guide de méditation pour débutants</h3>
                        <p class="text-gray-600 mb-4">Découvrez les bases de la méditation et comment l'intégrer dans votre quotidien pour améliorer votre bien-être mental.</p>
                        <a href="#" class="inline-flex items-center font-medium text-pvn-green hover:text-pvn-dark-green transition-colors duration-300">
                            Lire plus 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Article 2 -->
                <div class="bg-pvn-light-beige rounded-xl overflow-hidden shadow-lg group transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-2">
                    <div class="relative overflow-hidden h-56">
                        <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" 
                             alt="Gestion du stress" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white text-pvn-dark-green">
                                Santé mentale
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>5 Juin 2023</span>
                        </div>
                        <h3 class="text-xl font-semibold text-pvn-dark-green mb-3 group-hover:text-pvn-green transition-colors duration-300">5 techniques de gestion du stress</h3>
                        <p class="text-gray-600 mb-4">Des méthodes pratiques et efficaces pour gérer le stress au quotidien et retrouver votre sérénité.</p>
                        <a href="#" class="inline-flex items-center font-medium text-pvn-green hover:text-pvn-dark-green transition-colors duration-300">
                            Lire plus 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Article 3 -->
                <div class="bg-pvn-light-beige rounded-xl overflow-hidden shadow-lg group transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-2">
                    <div class="relative overflow-hidden h-56">
                        <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" 
                             alt="Bien-être" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white text-pvn-dark-green">
                                Sommeil
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>20 Juin 2023</span>
                        </div>
                        <h3 class="text-xl font-semibold text-pvn-dark-green mb-3 group-hover:text-pvn-green transition-colors duration-300">L'importance du sommeil</h3>
                        <p class="text-gray-600 mb-4">Comment améliorer la qualité de votre sommeil pour un meilleur bien-être physique et mental.</p>
                        <a href="#" class="inline-flex items-center font-medium text-pvn-green hover:text-pvn-dark-green transition-colors duration-300">
                            Lire plus 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Bouton "Voir tous les articles" -->
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-pvn-green hover:bg-pvn-dark-green transition-colors duration-300">
                    Voir tous les articles
                </a>
            </div>
        </div>
    </div>

    <!-- Section CTA -->
    <div class="bg-pvn-light-beige py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-pvn-dark-green rounded-2xl shadow-xl overflow-hidden">
                <div class="px-6 py-12 md:p-12 md:flex md:items-center md:justify-between">
                    <div class="md:w-0 md:flex-1">
                        <h2 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                            Prêt à commencer votre voyage vers le bien-être?
                        </h2>
                        <p class="mt-3 max-w-3xl text-lg text-white opacity-90">
                            Rejoignez notre communauté aujourd'hui et accédez à des ressources exclusives.
                        </p>
                    </div>
                    <div class="mt-8 md:mt-0 md:ml-8">
                        <div class="rounded-md shadow">
                            <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-pvn-dark-green bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10 transition-colors duration-300">
                                S'inscrire gratuitement
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
@endsection
