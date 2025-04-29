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
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
                    <a href="/dashboard-psychologist" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="/dashboardPsy" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                    <a href="/psychologist/appointments" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Mes Rendez-vous</a>
                    <a href="/psychologist-patients" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Patients</a>
                    <a href="/ressource" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">mes ressources</a>
                    <a href="/ressource/create" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">create resource</a>
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center text-pvn-dark-green hover:text-pvn-green">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                alt="Photo de profil" 
                                class="h-8 w-8 rounded-full">
                            <span class="ml-2">Dr. Lambert</span>
                        </button>
                    </div>
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
                <a href="/dashboard-psychologist" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Tableau de bord</a>
                <a href="/psychologist-appointments" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Mes Rendez-vous</a>
                <a href="/psychologist-patients" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Patients</a>
                <a href="/anonymous-forum" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Forum Anonyme</a>
                <a href="/psychologist-profile" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Profil</a>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
            <!-- En-tête -->
            <div class="p-6 bg-pvn-light-beige">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-3xl font-bold text-pvn-dark-green">{{ $resource->title }}</h1>
                        <p class="text-pvn-green mt-2">
                            Publié par {{ $resource->user->name }} • 
                            {{ $resource->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                    <span class="bg-pvn-green text-white px-3 py-1 rounded-full text-sm">
                        {{ ucfirst($resource->type) }}
                    </span>
                </div>
            </div>

            <!-- Contenu principal -->
            <div class="p-6">
                @if($resource->file_path)
                    @if($resource->type === 'video')
                        <div class="video-container mb-6">
                            <video controls class="w-full">
                                <source src="{{ asset('storage/'.$resource->file_path) }}" type="video/mp4">
                            </video>
                        </div>
                    @elseif($resource->type === 'pdf')
                        <iframe src="{{ asset('storage/'.$resource->file_path) }}" 
                                class="w-full h-96 mb-6 border rounded-lg"></iframe>
                    @else
                        <img src="{{ asset('storage/'.$resource->file_path) }}" 
                             alt="{{ $resource->title }}" 
                             class="w-full rounded-lg mb-6">
                    @endif
                @endif

                @if($resource->url)
                    <div class="video-container mb-6">
                        <iframe src="{{ $resource->url }}" 
                                frameborder="0" 
                                allowfullscreen></iframe>
                    </div>
                @endif

                <div class="prose max-w-none">
                    <h3 class="text-xl font-semibold text-pvn-dark-green mb-4">Description</h3>
                    <p class="text-gray-700 whitespace-pre-wrap">{{ $resource->description }}</p>

                    @if($resource->categories)
                        <div class="mt-8">
                            <h4 class="text-lg font-semibold text-pvn-dark-green mb-2">Catégories</h4>
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

            <!-- Pied de page -->
            <div class="p-6 bg-gray-50 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <a href="{{ route('ressource') }}" 
                       class="text-pvn-green hover:text-pvn-dark-green font-medium">
                        <i class="fas fa-arrow-left mr-2"></i> Retour aux ressources
                    </a>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm">
                            <i class="fas fa-eye mr-1"></i> {{ $resource->views }} vues
                        </span>
                        @if($resource->file_path)
                            <a href="{{ asset('storage/'.$resource->file_path) }}" download 
                               class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green transition-colors">
                                <i class="fas fa-download mr-2"></i> Télécharger
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>