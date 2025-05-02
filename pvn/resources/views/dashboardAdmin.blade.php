@extends('layout.navAdmin')
@section('title', 'Tableau de bord')

@section('content')

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

        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-pvn-dark-green">Tableau de bord administrateur</h1>
                    <p class="text-gray-600">Vue d'ensemble de la plateforme</p>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Total Users -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Utilisateurs</h2>
                    <i class="fas fa-users text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">{{ $stats['total_users'] }}</p>
            </div>

            <!-- Active Psychologists -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Psychologues</h2>
                    <i class="fas fa-user-md text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">{{ $stats['total_psychologists'] }}</p>
                <p class="text-sm text-orange-600">{{ $stats['pending_psychologists'] }} en attente d'approbation</p>
            </div>

            <!-- Resources -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Ressources</h2>
                    <i class="fas fa-book text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">{{ $stats['total_resources'] }}</p>
                <p class="text-sm text-green-600">{{ $stats['active_resources'] }} actives</p>
            </div>

            <!-- Reports -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Signalements</h2>
                    <i class="fas fa-flag text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">{{ $stats['pending_reports'] ?? 0 }}</p>
                <p class="text-sm text-orange-600">
                    <a href="{{ route('admin.reports.index') }}" class="hover:underline">Voir les signalements</a>
                </p>
            </div>
        </div>

        <!-- Recent Activity and Pending Approvals -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">Activité récente</h2>
                <div class="space-y-4">
                    @forelse($recent_activity as $activity)
                        <div class="flex items-center space-x-4">
                            <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                                <i class="fas fa-{{ $activity['icon'] }} text-pvn-green"></i>
                            </div>
                            <div>
                                <p class="font-medium text-pvn-dark-green">{{ $activity['message'] }}</p>
                                <p class="text-sm text-gray-600">{{ $activity['time']->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Aucune activité récente.</p>
                    @endforelse
                </div>
            </div>

            <!-- Pending Approvals -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Psychologues en attente d'approbation</h2>
                    <a href="{{ route('admin.psychologists') }}" class="text-pvn-green hover:text-pvn-dark-green text-sm">
                        Voir tout <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="space-y-4">
                    @forelse($pending_psychologists as $psychologist)
                        <div class="flex items-center justify-between p-4 bg-pvn-light-beige rounded-lg">
                            <div class="flex items-center space-x-4">
                                <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center">
                                    <i class="fas fa-user-md text-pvn-green"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-pvn-dark-green">{{ $psychologist->name }}</p>
                                    <p class="text-sm text-gray-600">Inscrit {{ $psychologist->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <form action="{{ route('admin.psychologists.approve', $psychologist) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:text-green-800">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.psychologists.reject', $psychologist) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Aucun psychologue en attente d'approbation.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Reports Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green">Signalements récents</h2>
                <a href="{{ route('admin.reports.index') }}" class="text-pvn-green hover:text-pvn-dark-green text-sm">
                    Voir tous les signalements <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            
            @if(isset($recent_reports) && count($recent_reports) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-pvn-light-beige">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">Raison</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">Signalé par</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-pvn-dark-green uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($recent_reports as $report)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pvn-light-beige text-pvn-dark-green">
                                            {{ $report->anonymous_post_id ? 'Message' : 'Commentaire' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ ucfirst($report->reason) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $report->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $report->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.reports.show', $report) }}" class="text-pvn-green hover:text-pvn-dark-green">
                                            Voir
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">Aucun signalement récent.</p>
            @endif
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
@endsection