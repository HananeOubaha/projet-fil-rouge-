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
                <a href="/dashboard-psychologist" class="flex items-center">
                    <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                    <span class="text-pvn-dark-green font-semibold text-xl">PVN</span>
                </a>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="/dashboardPsy" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                    <a href="/psychologist/appointments" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Mes Rendez-vous</a>
                    <a href="/psychologist-patients" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Patients</a>
                    <a href="/ressource" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Mes ressources</a>
                    <a href="/ressource/create" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Créer ressource</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form> 
                </div>
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
</body>
</html>