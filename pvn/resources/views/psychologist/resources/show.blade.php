<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $resource->title }} | PVN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }
        .video-container iframe,
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .resource-header {
            background: linear-gradient(135deg, #7C9A92, #557571);
            color: white;
        }
        .resource-header h1 {
            font-size: 2.5rem;
        }
        .category-badge {
            background-color: #FAF6F0;
            color: #557571;
        }
        .button-download {
            transition: background-color 0.3s ease;
        }
        .button-download:hover {
            background-color: #3E5553;
        }
        .like-button:hover .like-icon {
            color: #7C9A92;
        }
        #comments-list {
            max-height: 400px;
            overflow-y: auto;
        }
        .delete-icon {
            transition: color 0.2s ease;
        }
        .delete-icon:hover {
            color: #e53e3e;
        }
    </style>
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
                <a href="{{ route('message') }}" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Messages</a>
                <a href="{{ route('appointments.create') }}" class="block bg-pvn-green text-white px-4 py-2 rounded-md text-center">
                    <i class="fas fa-calendar-plus mr-2"></i>Réserver
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">
                        Logout
                    </button>
                </form>
                <a href="#" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Profil</a>
            </div>
        </div>
    </nav>
    
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Affichage des messages de succès -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Affichage des messages d'erreur -->
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
            <!-- En-tête -->
            <div class="resource-header p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="font-bold">{{ $resource->title }}</h1>
                        <p class="mt-2">
                            <span class="font-medium">Publié par:</span> {{ $resource->user->name }}<br>
                            <span class="font-medium">Date:</span> {{ $resource->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                    <span class="px-4 py-2 rounded-full text-sm font-medium category-badge">
                        {{ ucfirst($resource->type) }}
                    </span>
                </div>
            </div>

            <!-- Contenu principal -->
            <div class="p-6">
                <div class="mb-6">
                    @if($resource->file_path)
                        @if($resource->type === 'video')
                            <div class="video-container">
                                <video controls class="rounded-lg">
                                    <source src="{{ asset('storage/'.$resource->file_path) }}" type="video/mp4">
                                </video>
                            </div>
                        @elseif($resource->type === 'pdf')
                            <iframe src="{{ asset('storage/'.$resource->file_path) }}" class="w-full h-96 border rounded-lg"></iframe>
                        @else
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/'.$resource->file_path) }}" alt="{{ $resource->title }}" class="max-w-md rounded-lg shadow-lg">
                            </div>
                        @endif
                    @endif

                    @if($resource->url)
                        <div class="video-container mt-6">
                            <iframe src="{{ $resource->url }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    @endif
                </div>

                <div class="prose max-w-none">
                    <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Description</h2>
                    <p class="text-gray-700 whitespace-pre-wrap">{{ $resource->description }}</p>
                    @if($resource->categories->count() > 0)
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-pvn-dark-green mb-2">Catégories</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($resource->categories as $category)
                                <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">
                                    {{ $category->nom }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
                </div>
            </div>
            
            <!-- Likes and Comments Section -->
            <div class="mt-8 border-t border-gray-200 pt-6">
                <!-- Like Button -->
                <div class="flex items-center space-x-4 mb-6">
                    <!-- Formulaire de like -->
                    <form action="{{ route('resources.like', $resource) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="flex items-center space-x-1 text-gray-600 hover:text-pvn-green transition-colors">
                            @if($resource->isLikedBy(auth()->user()))
                                <i class="fas fa-heart text-2xl text-pvn-green"></i>
                            @else
                                <i class="far fa-heart text-2xl"></i>
                            @endif
                            <span>{{ $resource->likes->count() }}</span>
                        </button>
                    </form>
                    
                    <a href="#comments" class="flex items-center space-x-1 text-gray-600 hover:text-pvn-green transition-colors">
                        <i class="far fa-comment text-2xl"></i>
                        <span>{{ $resource->comments->count() }}</span>
                    </a>
                </div>

                <!-- Comments Section -->
                <div id="comments" class="mt-6">
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-4">Commentaires</h3>
                    
                    <!-- Comment Form -->
                    @auth
                    <div class="mb-6">
                        <!-- Formulaire de commentaire -->
                        <form action="{{ route('resources.comment', $resource) }}" method="POST" class="flex space-x-2">
                            @csrf
                            <input type="text" name="content" placeholder="Ajouter un commentaire..." 
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green" required>
                            <button type="submit" class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green">
                                Publier
                            </button>
                        </form>
                    </div>
                    @endauth

                    <!-- Comments List -->
                    <div id="comments-list" class="space-y-4">
                        @foreach($resource->comments as $comment)
                            <div class="bg-pvn-light-beige p-4 rounded-lg">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-medium text-pvn-dark-green">{{ $comment->user->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    
                                    <!-- Bouton de suppression (visible uniquement pour l'auteur du commentaire) -->
                                    @if(auth()->check() && auth()->id() === $comment->user_id)
                                        <form action="{{ route('comments.delete', $comment) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-500 hover:text-red-600 transition-colors delete-icon" title="Supprimer ce commentaire">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Pied de page -->
            <div class="p-6 bg-gray-50 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <a href="{{ route('ressource') }}" class="text-pvn-green hover:text-pvn-dark-green font-medium">
                        <i class="fas fa-arrow-left mr-2"></i> Retour aux ressources
                    </a>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm">
                            <i class="fas fa-eye mr-1"></i> {{ $resource->views }} vues
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
