<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $resource->title }} | PVN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Ajouter Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
        #like-button:hover #like-icon {
    color: #7C9A92;
}

#comments-list {
    max-height: 400px;
    overflow-y: auto;
}

.comment-enter {
    opacity: 0;
    transform: translateY(-10px);
}
.comment-enter-active {
    opacity: 1;
    transform: translateY(0);
    transition: all 300ms ease-out;
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
                    <!-- <div class="relative">
                        <button id="user-menu-button" class="flex items-center text-pvn-dark-green hover:text-pvn-green">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                alt="Photo de profil" 
                                class="h-8 w-8 rounded-full">
                            <span class="ml-2">Jean Dupont</span>
                        </button>
                    </div> -->
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
                    @if($resource->categories)
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold text-pvn-dark-green mb-2">Catégories</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($resource->categories as $category)
                                    <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">
                                        {{ $category }}
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
                    <button id="like-button" 
                            class="flex items-center space-x-1 text-gray-600 hover:text-pvn-green transition-colors"
                            data-resource-id="{{ $resource->id }}"
                            data-liked="{{ $resource->isLikedBy(auth()->user()) ? 'true' : 'false' }}">
                        <i class="far fa-heart text-2xl {{ $resource->isLikedBy(auth()->user()) ? 'hidden' : '' }}" id="like-icon"></i>
                        <i class="fas fa-heart text-2xl text-pvn-green {{ $resource->isLikedBy(auth()->user()) ? '' : 'hidden' }}" id="liked-icon"></i>
                        <span id="likes-count">{{ $resource->likes->count() }}</span>
                    </button>
                    
                    <button id="toggle-comments" class="flex items-center space-x-1 text-gray-600 hover:text-pvn-green transition-colors">
                        <i class="far fa-comment text-2xl"></i>
                        <span id="comments-count">{{ $resource->comments->count() }}</span>
                    </button>
                </div>

                <!-- Comments Section (Initially Hidden) -->
                <div id="comments-section" class="hidden">
                    <!-- Comment Form -->
                    @auth
                    <div class="mb-6">
                        <form id="comment-form" class="flex space-x-2">
                            @csrf
                            <input type="text" name="content" placeholder="Ajouter un commentaire..." 
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
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
                        @if($resource->file_path)
                            <a href="{{ asset('storage/'.$resource->file_path) }}" download class="bg-pvn-green text-white px-4 py-2 rounded-md button-download">
                                <i class="fas fa-download mr-2"></i> Télécharger
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Configuration d'Axios pour inclure le token CSRF dans toutes les requêtes
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                                       document.querySelector('input[name="_token"]')?.value;

        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Like functionality
        document.getElementById('like-button').addEventListener('click', function() {
            const resourceId = this.getAttribute('data-resource-id');
            const isLiked = this.getAttribute('data-liked') === 'true';
            
            axios.post(`/resources/${resourceId}/like`)
                .then(response => {
                    document.getElementById('likes-count').textContent = response.data.likes_count;
                    
                    if (response.data.liked) {
                        document.getElementById('like-icon').classList.add('hidden');
                        document.getElementById('liked-icon').classList.remove('hidden');
                        this.setAttribute('data-liked', 'true');
                    } else {
                        document.getElementById('like-icon').classList.remove('hidden');
                        document.getElementById('liked-icon').classList.add('hidden');
                        this.setAttribute('data-liked', 'false');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    if (error.response && error.response.status === 401) {
                        window.location.href = '/login';
                    }
                });
        });
    
        // Toggle comments
        document.getElementById('toggle-comments').addEventListener('click', function() {
            const commentsSection = document.getElementById('comments-section');
            commentsSection.classList.toggle('hidden');
        });
    
        // Submit comment
        const commentForm = document.getElementById('comment-form');
        if (commentForm) {
            commentForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const resourceId = document.getElementById('like-button').getAttribute('data-resource-id');
                const formData = new FormData(this);
                
                axios.post(`/resources/${resourceId}/comment`, formData)
                    .then(response => {
                        // Add new comment to the list
                        const commentsList = document.getElementById('comments-list');
                        const newComment = document.createElement('div');
                        newComment.className = 'bg-pvn-light-beige p-4 rounded-lg';
                        newComment.innerHTML = `
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-medium text-pvn-dark-green">${response.data.comment.user.name}</p>
                                    <p class="text-sm text-gray-500">${response.data.comment.created_at}</p>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-700">${response.data.comment.content}</p>
                        `;
                        commentsList.prepend(newComment);
                        
                        // Update comments count
                        document.getElementById('comments-count').textContent = response.data.comments_count;
                        
                        // Clear the input
                        this.reset();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        if (error.response && error.response.status === 401) {
                            window.location.href = '/login';
                        }
                    });
            });
        }
    </script>
</body>
</html>
