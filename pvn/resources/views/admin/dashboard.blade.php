@extends('layout.navAdmin)
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

            <!-- Categories -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Catégories</h2>
                    <i class="fas fa-tags text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">{{ $stats['total_categories'] }}</p>
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
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">Psychologues en attente d'approbation</h2>
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

        <!-- Platform Analytics -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">Évolution des utilisateurs</h2>
            <canvas id="analyticsChart" class="w-full h-64"></canvas>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Analytics Chart
        const ctx = document.getElementById('analyticsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($user_growth['labels']) !!},
                datasets: [{
                    label: 'Utilisateurs inscrits',
                    data: {!! json_encode($user_growth['data']) !!},
                    borderColor: '#7C9A92',
                    tension: 0.4,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
@endsection