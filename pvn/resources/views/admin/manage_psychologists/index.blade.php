<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PVN - Gestion des Psychologues</title>
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
                    <a href="{{ route('dashboardAdmin') }}" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Psychologues</a>
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
                    <h1 class="text-2xl font-bold text-pvn-dark-green">Gestion des Psychologues</h1>
                    <p class="text-gray-600">Liste des psychologues inscrits sur la plateforme</p>
                </div>
            </div>
        </div>

        <!-- Psychologists Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-pvn-light-beige">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">
                            Date d'inscription
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
                    @forelse($psychologists as $psychologist)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                                        <i class="fas fa-user-md text-pvn-green"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $psychologist->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $psychologist->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $psychologist->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($psychologist->status === 'pending')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        En attente
                                    </span>
                                @elseif($psychologist->status === 'approved')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Approuvé
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Rejeté
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @if($psychologist->status === 'pending')
                                    <div class="flex space-x-2">
                                        <form action="{{ route('admin.psychologists.approve', $psychologist) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-green-600 hover:text-green-900">Approuver</button>
                                        </form>
                                        <form action="{{ route('admin.psychologists.reject', $psychologist) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-900">Rejeter</button>
                                        </form>
                                    </div>
                                @elseif($psychologist->status === 'rejected')
                                    <form action="{{ route('admin.psychologists.approve', $psychologist) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-900">Approuver</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                Aucun psychologue trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $psychologists->links() }}
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