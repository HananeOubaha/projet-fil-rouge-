<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Positive Vibes Network</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'pvn': {
                            'beige': {
                                50: '#FDFBF7',
                                100: '#F9F6ED',
                                200: '#F2ECD9',
                                300: '#E9DFC1',
                                400: '#DDD0A5',
                                500: '#D1C089',
                            },
                            'green': {
                                50: '#F4F9F4',
                                100: '#E8F3E8',
                                200: '#D1E7D1',
                                300: '#B4D9B4',
                                400: '#93C793',
                                500: '#72B572',
                            }
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="bg-pvn-beige-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md fixed h-full">
            <div class="p-4">
                <a href="/" class="flex items-center mb-8">
                    <img src="https://placehold.co/40x40" alt="PVN Logo" class="h-10 w-10">
                    <span class="ml-2 text-xl font-semibold text-pvn-green-500">PVN</span>
                </a>
                <nav class="space-y-2">
                    <a href="/dashboard/index.html" class="flex items-center px-4 py-2 text-gray-700 bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-home mr-3"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="/dashboard/profile.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-user mr-3"></i>
                        <span>Profil</span>
                    </a>
                    <a href="/dashboard/appointments.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-calendar mr-3"></i>
                        <span>Rendez-vous</span>
                    </a>
                    <a href="/dashboard/resources.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-book mr-3"></i>
                        <span>Mes ressources</span>
                    </a>
                    <a href="/dashboard/journal.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-pen mr-3"></i>
                        <span>Journal</span>
                    </a>
                    <a href="/dashboard/messages.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-envelope mr-3"></i>
                        <span>Messages</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between h-16 px-8">
                    <h1 class="text-2xl font-semibold text-gray-800">Tableau de bord</h1>
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-600 hover:text-gray-900">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="relative">
                            <button class="flex items-center space-x-2">
                                <img src="https://placehold.co/32x32" alt="Profile" class="w-8 h-8 rounded-full">
                                <span class="text-gray-700">John Doe</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Rendez-vous à venir</p>
                                <h3 class="text-2xl font-bold text-gray-800">3</h3>
                            </div>
                            <div class="bg-pvn-green-100 p-3 rounded-full">
                                <i class="fas fa-calendar text-pvn-green-500"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Messages non lus</p>
                                <h3 class="text-2xl font-bold text-gray-800">5</h3>
                            </div>
                            <div class="bg-pvn-beige-100 p-3 rounded-full">
                                <i class="fas fa-envelope text-pvn-beige-500"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Ressources consultées</p>
                                <h3 class="text-2xl font-bold text-gray-800">12</h3>
                            </div>
                            <div class="bg-pvn-green-100 p-3 rounded-full">
                                <i class="fas fa-book text-pvn-green-500"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Entrées de journal</p>
                                <h3 class="text-2xl font-bold text-gray-800">8</h3>
                            </div>
                            <div class="bg-pvn-beige-100 p-3 rounded-full">
                                <i class="fas fa-pen text-pvn-beige-500"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Activités récentes</h2>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="bg-pvn-green-100 p-2 rounded-full">
                                <i class="fas fa-calendar text-pvn-green-500"></i>
                            </div>
                            <div>
                                <p class="text-gray-800">Rendez-vous confirmé avec Dr. Martin</p>
                                <p class="text-sm text-gray-500">Aujourd'hui à 14:30</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-pvn-beige-100 p-2 rounded-full">
                                <i class="fas fa-book text-pvn-beige-500"></i>
                            </div>
                            <div>
                                <p class="text-gray-800">Nouvelle ressource consultée : Guide de méditation</p>
                                <p class="text-sm text-gray-500">Hier à 18:45</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-pvn-green-100 p-2 rounded-full">
                                <i class="fas fa-pen text-pvn-green-500"></i>
                            </div>
                            <div>
                                <p class="text-gray-800">Nouvelle entrée de journal ajoutée</p>
                                <p class="text-sm text-gray-500">Il y a 2 jours</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Appointments -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Prochains rendez-vous</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-pvn-green-50 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <img src="https://placehold.co/48x48" alt="Dr. Martin" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold text-gray-800">Dr. Sophie Martin</p>
                                    <p class="text-sm text-gray-500">Consultation de suivi</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-800">14:30 - 15:30</p>
                                <p class="text-sm text-gray-500">Aujourd'hui</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-pvn-beige-50 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <img src="https://placehold.co/48x48" alt="Dr. Bernard" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold text-gray-800">Dr. Thomas Bernard</p>
                                    <p class="text-sm text-gray-500">Séance de groupe</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-800">10:00 - 11:30</p>
                                <p class="text-sm text-gray-500">Demain</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>
</body>
</html>