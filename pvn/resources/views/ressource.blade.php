<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Ressources</title>
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
                    <a href="{{ route('message') }}" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Messages</a>
                    <a href="{{ route('appointments.create') }}" class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green">
                        <i class="fas fa-calendar-plus mr-2"></i>Réserver
                    </a>
                    <a href="#" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Profil</a>
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
                <a href="{{ route('message') }}" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Messages</a>
                <a href="{{ route('appointments.create') }}" class="block bg-pvn-green text-white px-4 py-2 rounded-md text-center">
                    <i class="fas fa-calendar-plus mr-2"></i>Réserver
                </a>
                <a href="#" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Profil</a>
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
                        <option value="meditation">Méditation</option>
                        <option value="stress">Gestion du stress</option>
                        <option value="sleep">Sommeil</option>
                        <option value="anxiety">Anxiété</option>
                        <option value="depression">Dépression</option>
                        <option value="relationships">Relations</option>
                    </select>
                </div>
                <div>
                    <select id="type-filter" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                        <option value="">Tous les formats</option>
                        <option value="article">Articles</option>
                        <option value="video">Vidéos</option>
                        <option value="audio">Audios</option>
                        <option value="pdf">PDF</option>
                        <option value="exercise">Exercices</option>
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
</body>
</html>