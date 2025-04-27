<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Administration</title>
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
                    <a href="dashboard-admin.html" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN Admin</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="dashboard-admin.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                    <a href="admin-users.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Utilisateurs</a>
                    <a href="admin-resources.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Ressources</a>
                    <a href="admin-reports.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Signalements</a>
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center text-pvn-dark-green hover:text-pvn-green">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                alt="Photo de profil" 
                                class="h-8 w-8 rounded-full">
                            <span class="ml-2">Admin</span>
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
                <a href="dashboard-admin.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Tableau de bord</a>
                <a href="admin-users.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Utilisateurs</a>
                <a href="admin-resources.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Ressources</a>
                <a href="admin-reports.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Signalements</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-pvn-dark-green">Tableau de bord administrateur</h1>
                    <p class="text-gray-600">Vue d'ensemble de la plateforme</p>
                </div>
                <div class="flex space-x-4">
                    <button class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green">
                        <i class="fas fa-download mr-2"></i>
                        Exporter les données
                    </button>
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
                <p class="text-3xl font-bold text-pvn-dark-green">1,234</p>
                <p class="text-green-600">+12% ce mois</p>
            </div>

            <!-- Active Psychologists -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Psychologues</h2>
                    <i class="fas fa-user-md text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">45</p>
                <p class="text-green-600">+3 cette semaine</p>
            </div>

            <!-- Resources -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Ressources</h2>
                    <i class="fas fa-book text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">256</p>
                <p class="text-green-600">+8 cette semaine</p>
            </div>

            <!-- Reports -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Signalements</h2>
                    <i class="fas fa-flag text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">15</p>
                <p class="text-red-600">À traiter</p>
            </div>
        </div>

        <!-- Recent Activity and Pending Approvals -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">Activité récente</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-user-plus text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-pvn-dark-green">Nouveau psychologue inscrit</p>
                            <p class="text-sm text-gray-600">Il y a 10 minutes</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-flag text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-pvn-dark-green">Nouveau signalement de contenu</p>
                            <p class="text-sm text-gray-600">Il y a 1 heure</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-file-alt text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-pvn-dark-green">Nouvelle ressource publiée</p>
                            <p class="text-sm text-gray-600">Il y a 2 heures</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Approvals -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">En attente d'approbation</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-pvn-light-beige rounded-lg">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                 alt="Psychologue" 
                                 class="h-10 w-10 rounded-full">
                            <div>
                                <p class="font-medium text-pvn-dark-green">Dr. Marie Lambert</p>
                                <p class="text-sm text-gray-600">Validation du profil psychologue</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-green-600 hover:text-green-800">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-pvn-light-beige rounded-lg">
                        <div class="flex items-center space-x-4">
                            <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center">
                                <i class="fas fa-file-alt text-pvn-green"></i>
                            </div>
                            <div>
                                <p class="font-medium text-pvn-dark-green">Nouvelle ressource</p>
                                <p class="text-sm text-gray-600">Article sur la gestion du stress</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-green-600 hover:text-green-800">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Platform Analytics -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">Analyse de la plateforme</h2>
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
        // const ctx = document.getElementById('analyticsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Utilisateurs actifs',
                    data: [800, 950, 1100, 1250, 1400, 1234],
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