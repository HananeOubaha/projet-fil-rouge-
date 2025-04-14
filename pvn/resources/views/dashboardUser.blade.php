<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Tableau de bord</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <a href="dashboard-user.html" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="dashboard-user.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                    <a href="user-appointments.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Rendez-vous</a>
                    <a href="user-resources.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Ressources</a>
                    <a href="user-messages.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Messages</a>
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center text-pvn-dark-green hover:text-pvn-green">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                alt="Photo de profil" 
                                class="h-8 w-8 rounded-full">
                            <span class="ml-2">Jean Dupont</span>
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
                <a href="dashboard-user.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Tableau de bord</a>
                <a href="user-appointments.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Rendez-vous</a>
                <a href="user-resources.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Ressources</a>
                <a href="user-messages.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Messages</a>
                <a href="user-profile.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Profil</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-pvn-dark-green">Bonjour, Jean 👋</h1>
                    <p class="text-gray-600">Ravi de vous revoir ! Comment allez-vous aujourd'hui ?</p>
                </div>
                <button class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green">
                    Commencer un quiz bien-être
                </button>
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
                <div class="space-y-2">
                    <p class="text-gray-600">Dr. Marie Lambert</p>
                    <p class="text-gray-800 font-semibold">Mercredi, 15 Mars 2025</p>
                    <p class="text-gray-600">14:30 - 15:30</p>
                    <button class="mt-4 text-pvn-green hover:text-pvn-dark-green font-medium">
                        Voir tous les rendez-vous →
                    </button>
                </div>
            </div>

            <!-- Dernière humeur -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Votre humeur</h2>
                    <i class="fas fa-smile text-pvn-green text-xl"></i>
                </div>
                <!-- <canvas id="moodChart" class="w-full h-32"></canvas> -->
                <button class="mt-4 text-pvn-green hover:text-pvn-dark-green font-medium">
                    Voir l'historique complet →
                </button>
            </div>

            <!-- Messages non lus -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Messages non lus</h2>
                    <i class="fas fa-envelope text-pvn-green text-xl"></i>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                             alt="Dr. Lambert" 
                             class="h-10 w-10 rounded-full">
                        <div>
                            <p class="font-medium text-gray-800">Dr. Marie Lambert</p>
                            <p class="text-sm text-gray-600">À propos de votre dernier...</p>
                        </div>
                    </div>
                    <button class="text-pvn-green hover:text-pvn-dark-green font-medium">
                        Voir tous les messages →
                    </button>
                </div>
            </div>
        </div>

        <!-- Resources and Activities -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Ressources recommandées -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Ressources recommandées</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&h=100&q=80" 
                                 alt="Méditation" 
                                 class="h-16 w-16 rounded-lg object-cover">
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800">Guide de méditation pour débutants</h3>
                            <p class="text-sm text-gray-600">10 minutes de lecture</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&h=100&q=80" 
                                 alt="Stress" 
                                 class="h-16 w-16 rounded-lg object-cover">
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800">Gérer le stress au quotidien</h3>
                            <p class="text-sm text-gray-600">15 minutes de lecture</p>
                        </div>
                    </div>
                </div>
                <button class="mt-6 text-pvn-green hover:text-pvn-dark-green font-medium">
                    Voir toutes les ressources →
                </button>
            </div>

            <!-- Activités récentes -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Activités récentes</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-check text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Quiz bien-être complété</p>
                            <p class="text-sm text-gray-600">Il y a 2 jours</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-comment text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Message envoyé à Dr. Lambert</p>
                            <p class="text-sm text-gray-600">Il y a 3 jours</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-book text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Article lu : "Mieux dormir"</p>
                            <p class="text-sm text-gray-600">Il y a 4 jours</p>
                        </div>
                    </div>
                </div>
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

        // Mood Chart
        const ctx = document.getElementById('moodChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                datasets: [{
                    label: 'Niveau d\'humeur',
                    data: [7, 6, 8, 7, 8, 9, 8],
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
                        beginAtZero: true,
                        max: 10
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>