<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Ressources</title>
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

        <!-- Resources Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($resources as $resource)
                <a href="{{ route('ressource.show', $resource) }}" class="block bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    @if($resource->file_path)
                        <div class="h-48 overflow-hidden">
                            @if(in_array($resource->type, ['video', 'audio']))
                                <div class="bg-gray-200 w-full h-full flex items-center justify-center">
                                    <i class="fas fa-play-circle text-5xl text-pvn-green opacity-70"></i>
                                </div>
                            @elseif($resource->type === 'pdf')
                                <div class="bg-gray-200 w-full h-full flex items-center justify-center">
                                    <i class="fas fa-file-pdf text-5xl text-pvn-green opacity-70"></i>
                                </div>
                            @else
                                <img src="{{ asset('storage/'.$resource->file_path) }}" alt="{{ $resource->title }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                    @elseif($resource->url)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ $resource->url }}" alt="{{ $resource->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-5xl text-gray-400"></i>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">{{ ucfirst($resource->type) }}</span>
                            <span class="text-gray-500 text-sm">{{ $resource->views }} vues</span>
                        </div>
                        <h3 class="text-xl font-semibold text-pvn-dark-green mb-2 line-clamp-2">{{ $resource->title }}</h3>
                        <p class="text-gray-600 mb-2">{{ $resource->user->name }}</p>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $resource->description }}</p>
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($resource->categories as $category)
                                <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">
                                    {{ $category }}
                                </span>
                            @endforeach
                        </div>
                        <span class="inline-flex items-center text-pvn-green hover:text-pvn-dark-green font-medium">
                            Voir plus <i class="fas fa-arrow-right ml-1 text-sm"></i>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-8">
            <button class="bg-pvn-green text-white px-8 py-3 rounded-md hover:bg-pvn-dark-green transition-colors">
                Charger plus de ressources
            </button>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>