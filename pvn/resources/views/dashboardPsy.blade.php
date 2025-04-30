<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Tableau de bord Psychologue</title>
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
                    <a href="/dashboard-psychologist" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="/dashboardPsy" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                    <a href="/psychologist/appointments" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Mes Rendez-vous</a>
                    <a href="/psychologist-patients" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Patients</a>
                    <a href="/ressource/index" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">mes ressources</a>
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

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-pvn-dark-green">Bonjour, Dr. Lambert 👋</h1>
                    <p class="text-gray-600">Vous avez 5 rendez-vous aujourd'hui</p>
                </div>
                <div class="flex space-x-4">
                    <button class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green">
                        <i class="fas fa-calendar-plus mr-2"></i>
                        Ajouter un créneau
                    </button>
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
                <p class="text-3xl font-bold text-pvn-dark-green">127</p>
                <p class="text-gray-600">Ce mois-ci</p>
            </div>

            <!-- Taux de satisfaction -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Satisfaction</h2>
                    <i class="fas fa-smile text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">4.8/5</p>
                <p class="text-gray-600">Note moyenne</p>
            </div>

            <!-- Patients actifs -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Patients actifs</h2>
                    <i class="fas fa-users text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">45</p>
                <p class="text-gray-600">En suivi régulier</p>
            </div>

            <!-- Messages non lus -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">Messages</h2>
                    <i class="fas fa-envelope text-pvn-green text-xl"></i>
                </div>
                <p class="text-3xl font-bold text-pvn-dark-green">12</p>
                <p class="text-gray-600">Non lus</p>
            </div>
        </div>

        <!-- Appointments and Activity -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Today's Appointments -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">Rendez-vous du jour</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-pvn-light-beige rounded-lg">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                 alt="Patient" 
                                 class="h-10 w-10 rounded-full">
                            <div>
                                <p class="font-medium text-pvn-dark-green">Sophie Martin</p>
                                <p class="text-sm text-gray-600">09:00 - 10:00</p>
                            </div>
                        </div>
                        <button class="text-pvn-green hover:text-pvn-dark-green">
                            <i class="fas fa-video"></i>
                        </button>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-pvn-light-beige rounded-lg">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                 alt="Patient" 
                                 class="h-10 w-10 rounded-full">
                            <div>
                                <p class="font-medium text-pvn-dark-green">Thomas Dubois</p>
                                <p class="text-sm text-gray-600">11:00 - 12:00</p>
                            </div>
                        </div>
                        <button class="text-pvn-green hover:text-pvn-dark-green">
                            <i class="fas fa-video"></i>
                        </button>
                    </div>
                </div>
                <button class="mt-6 text-pvn-green hover:text-pvn-dark-green font-medium">
                    Voir tous les rendez-vous →
                </button>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">Activité récente</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-comment text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-pvn-dark-green">Nouveau message de Julie Petit</p>
                            <p class="text-sm text-gray-600">Il y a 10 minutes</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-calendar-check text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-pvn-dark-green">Rendez-vous confirmé avec Marc Bernard</p>
                            <p class="text-sm text-gray-600">Il y a 1 heure</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-full bg-pvn-light-beige flex items-center justify-center">
                            <i class="fas fa-file-alt text-pvn-green"></i>
                        </div>
                        <div>
                            <p class="font-medium text-pvn-dark-green">Nouveau rapport de suivi ajouté</p>
                            <p class="text-sm text-gray-600">Il y a 2 heures</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Patient Progress Chart -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <h2 class="text-xl font-semibold text-pvn-dark-green mb-6">Progrès des patients</h2>
            <canvas id="progressChart" class="w-full h-64"></canvas>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Progress Chart
        // const ctx = document.getElementById('progressChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Satisfaction moyenne',
                    data: [4.2, 4.4, 4.5, 4.6, 4.7, 4.8],
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
                        beginAtZero: false,
                        min: 3,
                        max: 5
                    }
                }
            }
        });
    </script>
</body>
</html>