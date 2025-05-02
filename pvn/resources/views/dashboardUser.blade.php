@extends('layout.navpatient')
@section('title', 'dashboard')

@section('content')
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-pvn-dark-green">Bonjour, {{ $user->name }} 👋</h1>
                    <p class="text-gray-600">Ravi de vous revoir ! Comment allez-vous aujourd'hui ?</p>
                </div>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('appointments.create') }}" class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green text-center">
                        <i class="fas fa-calendar-plus mr-2"></i>Prendre rendez-vous
                    </a>
                    <a href="{{ route('quiz') }}" class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green text-center">
                        <i class="fas fa-clipboard-list mr-2"></i>Commencer un quiz bien-être
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Prochain rendez-vous -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Prochain rendez-vous</h2>
                    <i class="fas fa-calendar text-pvn-green text-xl"></i>
                </div>
                @if($upcomingAppointment)
                <div class="space-y-2">
                    <p class="text-gray-600">Dr. {{ $upcomingAppointment->psychologist ? $upcomingAppointment->psychologist->name : 'Non assigné' }}</p>
                    <p class="text-gray-800 font-semibold">{{ $upcomingAppointment->appointment_date->format('l, d F Y') }}</p>
                    <p class="text-gray-600">{{ $upcomingAppointment->appointment_date->format('H:i') }} - {{ $upcomingAppointment->appointment_date->addHour()->format('H:i') }}</p>
                    <div class="mt-4 space-y-2">
                        <a href="{{ route('appointments.index') }}" class="text-pvn-green hover:text-pvn-dark-green font-medium inline-block">
                            Voir tous les rendez-vous →
                        </a>
                        <a href="{{ route('appointments.create') }}" class="block bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green text-center">
                            Nouveau rendez-vous
                        </a>
                    </div>
                </div>
                @else
                <div class="space-y-2">
                    <p class="text-gray-600">Vous n'avez pas de rendez-vous à venir.</p>
                    <div class="mt-4">
                        <a href="{{ route('appointments.create') }}" class="block bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green text-center">
                            Prendre un rendez-vous
                        </a>
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Forum anonyme -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Forum anonyme</h2>
                    <i class="fas fa-comments text-pvn-green text-xl"></i>
                </div>
                <p class="text-gray-600 mb-4">Partagez vos pensées et recevez du soutien de manière anonyme.</p>
                <a href="{{ route('anonymous.forum') }}" class="block bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green text-center">
                    Accéder au forum
                </a>
            </div>
            
            <!-- Quiz bien-être -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Quiz bien-être</h2>
                    <i class="fas fa-clipboard-check text-pvn-green text-xl"></i>
                </div>
                <p class="text-gray-600 mb-4">Évaluez votre bien-être mental et recevez des recommandations personnalisées.</p>
                <a href="{{ route('quiz') }}" class="block bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green text-center">
                    Commencer un quiz
                </a>
            </div>
        </div>

        <!-- Resources and Activities -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Ressources recommandées -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Ressources recommandées</h2>
                <div class="space-y-4">
                    @forelse($recommendedResources as $resource)
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            @if($resource->file_path && in_array($resource->type, ['image', 'pdf']))
                                <img src="{{ asset('storage/'.$resource->file_path) }}" 
                                     alt="{{ $resource->title }}" 
                                     class="h-16 w-16 rounded-lg object-cover">
                            @else
                                <div class="h-16 w-16 rounded-lg bg-pvn-light-beige flex items-center justify-center">
                                    <i class="fas fa-{{ $resource->type === 'video' ? 'video' : 'file-alt' }} text-pvn-green text-xl"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800">{{ $resource->title }}</h3>
                            <p class="text-sm text-gray-600">{{ Str::limit($resource->description, 50) }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-600">Aucune ressource recommandée pour le moment.</p>
                    @endforelse
                </div>
                <a href="{{ route('ressource') }}" class="mt-6 text-pvn-green hover:text-pvn-dark-green font-medium">
                    Voir toutes les ressources →
                </a>
            </div>

            <!-- Activités récentes -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Activités récentes</h2>
                <div class="space-y-4">
                    @forelse($recentActivities as $activity)
                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-{{ $activity['icon'] }} text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">{{ $activity['message'] }}</p>
                            <p class="text-sm text-gray-600">{{ $activity['time']->diffForHumans() }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-600">Aucune activité récente.</p>
                    @endforelse
                </div>
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
