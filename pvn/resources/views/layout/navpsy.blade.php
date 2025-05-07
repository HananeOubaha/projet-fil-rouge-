<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phosphenes - Tableau de bord Psychologue</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <a href="/dashboard-psychologist" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">Phosphenes</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="/dashboardPsy"
                        class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau
                        de bord</a>
                    <a href="/psychologist/appointments"
                        class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Mes
                        Rendez-vous</a>
                    {{-- <a href="/psychologist-patients"
                        class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Patients</a> --}}
                    <a href="/ressource/index"
                        class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">mes
                        ressources</a>
                    <a href="/ressource/create"
                        class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">create
                        resource</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
                    {{-- <div class="relative">
                        <button id="user-menu-button"
                            class="flex items-center text-pvn-dark-green hover:text-pvn-green">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Photo de profil" class="h-8 w-8 rounded-full">
                            <span class="ml-2">Dr. Lambert</span>
                        </button>
                    </div> --}}
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
                <a href="/dashboard-psychologist"
                    class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Tableau
                    de bord</a>
                <a href="/psychologist-appointments"
                    class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Mes
                    Rendez-vous</a>
                <a href="/psychologist-patients"
                    class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Patients</a>
                <a href="/anonymous-forum"
                    class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Forum
                    Anonyme</a>
            </div>
        </div>
    </nav>
    @yield('content')

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
</body>

</html>
