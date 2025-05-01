<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PVN - Gestion des Ressources</title>
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
                    <a href="{{ route('dashboardAdmin') }}" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN Admin</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('dashboardAdmin') }}" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                    <a href="{{ route('admin.psychologists') }}" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Psychologues</a>
                    <a href="{{ route('admin.resources') }}" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Ressources</a>
                    <a href="{{ route('admin.categories') }}" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Catégories</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">
                            Déconnexion
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
                <a href="{{ route('dashboardAdmin') }}" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Tableau de bord</a>
                <a href="{{ route('admin.psychologists') }}" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Psychologues</a>
                <a href="{{ route('admin.resources') }}" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Ressources</a>
                <a href="{{ route('admin.categories') }}" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Catégories</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Notifications -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Header -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-pvn-dark-green">Gestion des Ressources</h1>
                    <p class="text-gray-600">Liste des ressources publiées sur la plateforme</p>
                </div>
            </div>
        </div>

        <!-- Resources Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-pvn-light-beige">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">
                            Titre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">
                            Auteur
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">
                            Statut
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($resources as $resource)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $resource->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pvn-light-beige text-pvn-dark-green">
                                    {{ ucfirst($resource->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $resource->user->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $resource->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($resource->status === 'active')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('ressource.show', $resource->id) }}" class="text-pvn-green hover:text-pvn-dark-green" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.resources.toggle-status', $resource) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="{{ $resource->status === 'active' ? 'text-red-600 hover:text-red-900' : 'text-green-600 hover:text-green-900' }}">
                                            <i class="fas {{ $resource->status === 'active' ? 'fa-ban' : 'fa-check' }}"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                Aucune ressource trouvée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $resources->links() }}
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>