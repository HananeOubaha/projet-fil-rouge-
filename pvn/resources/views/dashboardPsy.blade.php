@extends('layout.navpsy')
@section('title', 'Tableau de bord')

@section('content')

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-pvn-dark-green">Bonjour, Dr. {{ $psychologist->name }} 👋</h1>
                    <p class="text-gray-600">Vous avez {{ $today_appointments->count() }} rendez-vous aujourd'hui</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('psychologist.resources.create') }}" class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green">
                        <i class="fas fa-file-medical mr-2"></i>
                        Ajouter une ressource
                    </a>
                    <button class="border border-pvn-green text-pvn-green px-4 py-2 rounded-md hover:bg-pvn-light-beige">
                        <i class="fas fa-clock mr-2"></i>
                        Gérer la disponibilité
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Consultations -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Consultations</h2>
                    <i class="fas fa-user-friends text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">{{ $stats['total_consultations'] }}</p>
                <p class="text-gray-600">Ce mois-ci</p>
            </div>
            <!-- Patients actifs -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Patients actifs</h2>
                    <i class="fas fa-users text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">{{ $stats['active_patients'] }}</p>
                <p class="text-gray-600">En suivi régulier</p>
            </div>

            <!-- Messages non lus -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Messages</h2>
                    <i class="fas fa-envelope text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">{{ $stats['unread_messages'] }}</p>
                <p class="text-gray-600">Non lus</p>
            </div>
        </div>

        <!-- Appointments and Activity -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Today's Appointments -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">Rendez-vous du jour</h2>
                <div class="space-y-4">
                    @forelse($today_appointments as $appointment)
                        <div class="flex items-center justify-between p-4 bg-pvn-light-beige rounded-lg">
                            <div class="flex items-center space-x-4">
                                <div class="h-10 w-10 rounded-full bg-pvn-green flex items-center justify-center text-white">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-pvn-dark-green">{{ $appointment->patient->name }}</p>
                                    <p class="text-sm text-gray-600">{{ Carbon\Carbon::parse($appointment->appointment_date)->format('H:i') }} - {{ Carbon\Carbon::parse($appointment->appointment_date)->addHour()->format('H:i') }}</p>
                                </div>
                            </div>
                            <a href="{{ route('psychologist.appointments.show', $appointment) }}" class="text-pvn-green hover:text-pvn-dark-green">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-500">Aucun rendez-vous aujourd'hui.</p>
                    @endforelse
                </div>
                <a href="{{ route('psychologist.appointments.index') }}" class="mt-6 inline-block text-pvn-green hover:text-pvn-dark-green font-medium">
                    Voir tous les rendez-vous →
                </a>
            </div>

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
        </div>
        
        <!-- Resources Stats -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green">Mes ressources</h2>
                <a href="{{ route('psychologist.resources.index') }}" class="text-pvn-green hover:text-pvn-dark-green font-medium">
                    Voir toutes mes ressources →
                </a>
            </div>
            
            @php
                $resources = App\Models\Resource::where('user_id', Auth::id())
                            ->orderBy('views', 'desc')
                            ->take(3)
                            ->get();
            @endphp
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($resources as $resource)
                    <div class="bg-pvn-light-beige p-4 rounded-lg">
                        <div class="flex justify-between items-start mb-2">
                            <span class="px-2 py-1 bg-white text-pvn-dark-green rounded-full text-xs font-medium">
                                {{ ucfirst($resource->type) }}
                            </span>
                            <span class="text-gray-600 text-sm">
                                <i class="fas fa-eye mr-1"></i> {{ $resource->views }}
                            </span>
                        </div>
                        <h3 class="font-medium text-pvn-dark-green mb-2">{{ Str::limit($resource->title, 40) }}</h3>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-gray-600 text-sm">
                                {{ $resource->created_at->format('d/m/Y') }}
                            </span>
                            <a href="{{ route('psychologist.resources.edit', $resource) }}" class="text-pvn-green hover:text-pvn-dark-green">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-4">
                        <p class="text-gray-500">Vous n'avez pas encore publié de ressources.</p>
                        <a href="{{ route('psychologist.resources.create') }}" class="mt-2 inline-block text-pvn-green hover:text-pvn-dark-green font-medium">
                            Créer ma première ressource →
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
@endsection