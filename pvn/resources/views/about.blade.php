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
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    },
                    transitionProperty: {
                        'height': 'height',
                        'spacing': 'margin, padding',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-pvn-beige min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center group">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl transition-colors duration-300 group-hover:text-pvn-green">PVN</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="/" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300 hover:bg-pvn-light-beige">Accueil</a>
                    <a href="/ressource" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300 hover:bg-pvn-light-beige">Ressources</a>
                    <a href="/about" class="text-pvn-dark-green px-3 py-2 rounded-md text-sm font-medium bg-pvn-light-beige border-b-2 border-pvn-green">À propos</a>
                    <a href="/login" class="bg-pvn-green text-white hover:bg-pvn-dark-green px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:shadow-md">Connexion</a>
                    <a href="/register" class="bg-pvn-dark-green text-white hover:bg-pvn-green px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:shadow-md">Inscription</a>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-pvn-dark-green hover:text-pvn-green transition-colors duration-300">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium transition-colors duration-300 hover:bg-pvn-light-beige">Accueil</a>
                <a href="/ressource" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium transition-colors duration-300 hover:bg-pvn-light-beige">Ressources</a>
                <a href="/about" class="block text-pvn-dark-green px-3 py-2 rounded-md text-base font-medium bg-pvn-light-beige border-l-4 border-pvn-green">À propos</a>
                <a href="/login" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium transition-colors duration-300 hover:bg-pvn-light-beige">Connexion</a>
                <a href="/register" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium transition-colors duration-300 hover:bg-pvn-light-beige">Inscription</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-pattern py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in">
                <span class="inline-block px-3 py-1 text-sm font-semibold text-pvn-dark-green bg-white rounded-full shadow-sm mb-4">Découvrez qui nous sommes</span>
                <h1 class="text-4xl md:text-5xl font-bold text-pvn-dark-green mb-6">Notre Mission</h1>
                <div class="w-20 h-1 bg-pvn-green mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Positive Vibes Network est né d'une vision simple : rendre le soutien psychologique accessible à tous, 
                    dans un environnement bienveillant et professionnel.
                </p>
                <div class="mt-8">
                    <a href="/register" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-pvn-green hover:bg-pvn-dark-green transition-colors duration-300">
                        Rejoignez-nous
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Nos Valeurs -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <span class="inline-block px-3 py-1 text-sm font-semibold text-pvn-dark-green bg-pvn-light-beige rounded-full mb-4">Ce qui nous définit</span>
                <h2 class="text-3xl font-bold text-pvn-dark-green">Nos Valeurs</h2>
                <div class="w-16 h-1 bg-pvn-green mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="value-card bg-white rounded-xl p-8 shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 scroll-reveal">
                    <div class="text-pvn-green text-4xl mb-6 icon-circle flex justify-center">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-4 text-center">Bienveillance</h3>
                    <p class="text-gray-600 text-center">Un espace sûr où chacun peut s'exprimer librement, sans jugement. Nous croyons en la force de l'empathie et du soutien mutuel.</p>
                </div>
                <div class="value-card bg-white rounded-xl p-8 shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 scroll-reveal" style="transition-delay: 0.2s;">
                    <div class="text-pvn-green text-4xl mb-6 icon-circle flex justify-center">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-4 text-center">Professionnalisme</h3>
                    <p class="text-gray-600 text-center">Des psychologues certifiés et une approche rigoureuse du bien-être mental. Nous nous engageons à offrir un service de qualité.</p>
                </div>
                <div class="value-card bg-white rounded-xl p-8 shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 scroll-reveal" style="transition-delay: 0.4s;">
                    <div class="text-pvn-green text-4xl mb-6 icon-circle flex justify-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-4 text-center">Communauté</h3>
                    <p class="text-gray-600 text-center">Une communauté solidaire qui s'entraide et se soutient mutuellement. Ensemble, nous sommes plus forts face aux défis de la vie.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Notre Histoire -->
    <div class="py-20 bg-pvn-light-beige relative">
        <div class="absolute top-0 left-0 w-full h-20 bg-white" style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 0);"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="scroll-reveal">
                    <div class="relative">
                        <div class="absolute inset-0 bg-pvn-green rounded-lg transform rotate-3 opacity-10"></div>
                        <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             alt="Notre équipe" 
                             class="relative rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-500">
                    </div>
                </div>
                <div class="scroll-reveal" style="transition-delay: 0.3s;">
                    <span class="inline-block px-3 py-1 text-sm font-semibold text-pvn-dark-green bg-white rounded-full shadow-sm mb-4">Notre parcours</span>
                    <h2 class="text-3xl font-bold text-pvn-dark-green mb-6">Notre Histoire</h2>
                    <div class="w-16 h-1 bg-pvn-green mb-6"></div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Fondé en 2025, PVN est né de la volonté de créer un espace en ligne où le bien-être mental 
                        serait accessible à tous. Notre équipe de professionnels passionnés travaille chaque jour 
                        pour faire de cette vision une réalité.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Aujourd'hui, nous sommes fiers d'avoir aidé des milliers de personnes à trouver leur chemin 
                        vers un meilleur équilibre mental et émotionnel.
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-pvn-green flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-pvn-dark-green">Notre engagement</h4>
                            <p class="text-gray-600">Fournir un soutien de qualité à tous ceux qui en ont besoin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Témoignages -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <span class="inline-block px-3 py-1 text-sm font-semibold text-pvn-dark-green bg-pvn-light-beige rounded-full mb-4">Ce que disent nos utilisateurs</span>
                <h2 class="text-3xl font-bold text-pvn-dark-green">Témoignages</h2>
                <div class="w-16 h-1 bg-pvn-green mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="testimonial-card bg-pvn-light-beige p-8 rounded-xl shadow-lg scroll-reveal">
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 rounded-full bg-pvn-green flex items-center justify-center text-white">
                                <span class="font-semibold">MD</span>
                            </div>
                        </div>
                        <div>
                            <div class="text-pvn-green text-2xl mb-2">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="text-gray-600 mb-4 italic leading-relaxed">
                                "PVN m'a aidé à traverser une période difficile de ma vie. Le soutien de la communauté 
                                et les conseils professionnels ont fait une réelle différence. Je me sens plus équilibrée et confiante."
                            </p>
                            <div class="flex items-center">
                                <p class="font-semibold text-pvn-dark-green">Marie D.</p>
                                <div class="ml-2 text-yellow-400 flex">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card bg-pvn-light-beige p-8 rounded-xl shadow-lg scroll-reveal" style="transition-delay: 0.2s;">
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 rounded-full bg-pvn-dark-green flex items-center justify-center text-white">
                                <span class="font-semibold">TB</span>
                            </div>
                        </div>
                        <div>
                            <div class="text-pvn-green text-2xl mb-2">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="text-gray-600 mb-4 italic leading-relaxed">
                                "En tant que psychologue sur PVN, je suis impressionné par l'engagement de la plateforme 
                                envers le bien-être mental et la qualité du soutien offert. C'est un honneur de faire partie de cette communauté."
                            </p>
                            <div class="flex items-center">
                                <p class="font-semibold text-pvn-dark-green">Dr. Thomas B.</p>
                                <div class="ml-2 text-yellow-400 flex">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-16 bg-pvn-light-beige">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-pvn-dark-green rounded-2xl shadow-xl overflow-hidden scroll-reveal">
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
                            <a href="/register" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-pvn-dark-green bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10 transition-colors duration-300">
                                S'inscrire gratuitement
                            </a>
                        </div>
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
                    <div class="flex items-center mb-4">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <h3 class="text-xl font-semibold">PVN</h3>
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
                            <span>123 Rue du Bien-être, 75000 Paris, France</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-pvn-green"></i>
                            <a href="mailto:contact@pvn.com" class="hover:underline">contact@pvn.com</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-pvn-green"></i>
                            <span>+33 1 23 45 67 89</span>
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

        // Scroll reveal animation
        document.addEventListener('DOMContentLoaded', function() {
            const scrollRevealElements = document.querySelectorAll('.scroll-reveal');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, {
                threshold: 0.1
            });
            
            scrollRevealElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>
</html>
