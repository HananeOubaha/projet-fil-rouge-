<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phosphenes - Ressources</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                    <a href="{{ route('dashboardUser') }}" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('dashboardUser') }}" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                    <a href="{{ route('appointments.index') }}" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Rendez-vous</a>
                    <a href="{{ route('ressource') }}" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Ressources</a>
                    <a href="{{ route('appointments.create') }}" class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green">
                        <i class="fas fa-calendar-plus mr-2"></i>Réserver
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
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
                <a href="{{ route('dashboardUser') }}" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Tableau de bord</a>
                <a href="{{ route('appointments.index') }}" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Rendez-vous</a>
                <a href="{{ route('ressource') }}" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Ressources</a>
                <a href="{{ route('appointments.create') }}" class="block bg-pvn-green text-white px-4 py-2 rounded-md text-center">
                    <i class="fas fa-calendar-plus mr-2"></i>Réserver
                </a>
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
                    <input type="text" id="search-input" placeholder="Rechercher une ressource..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                </div>
                <div>
                    <select id="category-filter" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                        <option value="">Toutes les catégories</option>
                        @foreach(App\Models\Category::orderBy('nom')->get() as $category)
                            <option value="{{ $category->nom }}">{{ $category->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select id="type-filter" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                        <option value="">Tous les formats</option>
                        <option value="article">Articles</option>
                        <option value="video">Vidéos</option>
                        <option value="pdf">PDF</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Resources Grid -->
        <div id="resources-container" class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @include('partials.resources_list', ['resources' => $resources])
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-8">
            <button id="load-more" class="bg-pvn-green text-white px-8 py-3 rounded-md hover:bg-pvn-dark-green transition-colors">
                Charger plus de ressources
            </button>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Filtres dynamiques
        const searchInput = document.getElementById('search-input');
        const categoryFilter = document.getElementById('category-filter');
        const typeFilter = document.getElementById('type-filter');
        const resourcesContainer = document.getElementById('resources-container');
        const loadMoreBtn = document.getElementById('load-more');

        let currentPage = 1;
        let isLoading = false;
        let hasMore = true;

        function fetchResources(page = 1, reset = false) {
            if (isLoading) return;
            
            isLoading = true;
            if (reset) {
                currentPage = 1;
                resourcesContainer.innerHTML = '';
                hasMore = true;
            }

            if (!hasMore) {
                loadMoreBtn.disabled = true;
                return;
            }

            loadMoreBtn.disabled = true;
            loadMoreBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Chargement...';

            const params = new URLSearchParams({
                search: searchInput.value,
                category: categoryFilter.value,
                type: typeFilter.value,
                page: page
            });

            axios.get(`/resources/filter?${params.toString()}`)
                .then(response => {
                    if (reset) {
                        resourcesContainer.innerHTML = response.data.html;
                    } else {
                        resourcesContainer.insertAdjacentHTML('beforeend', response.data.html);
                    }

                    hasMore = response.data.hasMore;
                    currentPage = page;

                    if (!hasMore) {
                        loadMoreBtn.classList.add('hidden');
                    } else {
                        loadMoreBtn.classList.remove('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error fetching resources:', error);
                    if (error.response) {
                        console.error('Response data:', error.response.data);
                        console.error('Response status:', error.response.status);
                    }
                })
                .finally(() => {
                    isLoading = false;
                    loadMoreBtn.disabled = false;
                    loadMoreBtn.innerHTML = 'Charger plus de ressources';
                });
        }

        // Écouteurs d'événements
        searchInput.addEventListener('input', () => {
            clearTimeout(window.searchTimer);
            window.searchTimer = setTimeout(() => {
                fetchResources(1, true);
            }, 500);
        });

        categoryFilter.addEventListener('change', () => fetchResources(1, true));
        typeFilter.addEventListener('change', () => fetchResources(1, true));
        loadMoreBtn.addEventListener('click', () => fetchResources(currentPage + 1));

        // Initial load
        fetchResources(1, true);
    </script>
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
