<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Ressources - Positive Vibes Network</title>
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
</head>
<body class="bg-pvn-beige-50">
    <div class="min-h-screen flex">
        <!-- Sidebar (same as index.html) -->
        <aside class="w-64 bg-white shadow-md fixed h-full">
            <div class="p-4">
                <a href="/" class="flex items-center mb-8">
                    <img src="https://placehold.co/40x40" alt="PVN Logo" class="h-10 w-10">
                    <span class="ml-2 text-xl font-semibold text-pvn-green-500">PVN</span>
                </a>
                <nav class="space-y-2">
                    <a href="index.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-home mr-3"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="patients.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-users mr-3"></i>
                        <span>Mes patients</span>
                    </a>
                    <a href="appointments.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-calendar mr-3"></i>
                        <span>Rendez-vous</span>
                    </a>
                    <a href="resources.html" class="flex items-center px-4 py-2 text-gray-700 bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-book mr-3"></i>
                        <span>Ressources</span>
                    </a>
                    <a href="messages.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-envelope mr-3"></i>
                        <span>Messages</span>
                    </a>
                    <a href="profile.html" class="flex items-center px-4 py-2 text-gray-600 hover:bg-pvn-green-50 rounded-lg">
                        <i class="fas fa-user-md mr-3"></i>
                        <span>Mon profil</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between h-16 px-8">
                    <h1 class="text-2xl font-semibold text-gray-800">Gestion des Ressources</h1>
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-600 hover:text-gray-900">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="relative">
                            <button class="flex items-center space-x-2">
                                <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&q=80&w=32&h=32" 
                                     alt="Profile" 
                                     class="w-8 h-8 rounded-full object-cover">
                                <span class="text-gray-700">Dr. Sophie Martin</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Resources Content -->
            <div class="p-8">
                <!-- Add New Resource Form -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Ajouter une nouvelle ressource</h2>
                    <form id="resourceForm" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Titre
                                </label>
                                <input
                                    type="text"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                                    placeholder="Titre de la ressource"
                                    required
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Type de ressource
                                </label>
                                <select
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                                    required
                                >
                                    <option value="">Sélectionner un type</option>
                                    <option value="article">Article</option>
                                    <option value="video">Vidéo</option>
                                    <option value="audio">Audio</option>
                                    <option value="pdf">PDF</option>
                                    <option value="exercise">Exercice pratique</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea
                                rows="4"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                                placeholder="Description détaillée de la ressource"
                                required
                            ></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Catégories
                            </label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="text-pvn-green-500 rounded">
                                    <span>Stress</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="text-pvn-green-500 rounded">
                                    <span>Anxiété</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="text-pvn-green-500 rounded">
                                    <span>Dépression</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="text-pvn-green-500 rounded">
                                    <span>Méditation</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="text-pvn-green-500 rounded">
                                    <span>Sommeil</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="text-pvn-green-500 rounded">
                                    <span>Bien-être</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Fichier ou URL
                            </label>
                            <div class="flex space-x-4">
                                <input
                                    type="file"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                                >
                                <span class="text-gray-500">ou</span>
                                <input
                                    type="url"
                                    placeholder="URL de la ressource"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                                >
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="button" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                Annuler
                            </button>
                            <button type="submit" class="px-6 py-2 bg-pvn-green-500 text-white rounded-lg hover:bg-pvn-green-600">
                                Publier la ressource
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Resources List -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Mes ressources</h2>
                        <div class="flex space-x-4">
                            <div class="relative">
                                <input
                                    type="text"
                                    placeholder="Rechercher..."
                                    class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                                >
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                            <select class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent">
                                <option>Tous les types</option>
                                <option>Articles</option>
                                <option>Vidéos</option>
                                <option>Audio</option>
                                <option>PDF</option>
                                <option>Exercices</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- Resource Item -->
                        <div class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg hover:bg-pvn-green-50">
                            <div class="flex items-center space-x-4">
                                <div class="bg-pvn-green-100 p-3 rounded-lg">
                                    <i class="fas fa-book text-pvn-green-500"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Guide de méditation quotidienne</h3>
                                    <p class="text-sm text-gray-500">PDF • Publié le 15 janvier 2025</p>
                                    <div class="flex space-x-2 mt-1">
                                        <span class="text-xs bg-pvn-green-100 text-pvn-green-600 px-2 py-1 rounded-full">
                                            Méditation
                                        </span>
                                        <span class="text-xs bg-pvn-green-100 text-pvn-green-600 px-2 py-1 rounded-full">
                                            Bien-être
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-600">45 vues</p>
                                    <p class="text-xs text-gray-500">12 téléchargements</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="p-2 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="p-2 text-gray-600 hover:text-gray-900">
                                        
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Resource Item -->
                        <div class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg hover:bg-pvn-green-50">
                            <div class="flex items-center space-x-4">
                                <div class="bg-pvn-beige-100 p-3 rounded-lg">
                                    <i class="fas fa-video text-pvn-beige-500"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Exercices de respiration guidée</h3>
                                    <p class="text-sm text-gray-500">Vidéo • Publié le 14 janvier 2025</p>
                                    <div class="flex space-x-2 mt-1">
                                        <span class="text-xs bg-pvn-green-100 text-pvn-green-600 px-2 py-1 rounded-full">
                                            Stress
                                        </span>
                                        <span class="text-xs bg-pvn-green-100 text-pvn-green-600 px-2 py-1 rounded-full">
                                            Anxiété
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-600">78 vues</p>
                                    <p class="text-xs text-gray-500">23 téléchargements</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="p-2 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="p-2 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple JavaScript for form handling
        document.addEventListener('DOMContentLoaded', function() {
            const resourceForm = document.getElementById('resourceForm');
            
            resourceForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Ressource publiée avec succès !');
                resourceForm.reset();
            });

            // Add click handlers for edit and delete buttons
            document.querySelectorAll('.fa-edit').forEach(button => {
                button.addEventListener('click', function() {
                    alert('Modifier la ressource');
                });
            });

            document.querySelectorAll('.fa-trash').forEach(button => {
                button.addEventListener('click', function() {
                    if(confirm('Êtes-vous sûr de vouloir supprimer cette ressource ?')) {
                        alert('Ressource supprimée');
                    }
                });
            });
        });
    </script>
</body>
</html>