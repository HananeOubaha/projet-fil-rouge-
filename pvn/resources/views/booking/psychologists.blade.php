<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Psychologues - Positive Vibes Network</title>
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
    <!-- Navigation (same as index.html) -->
    <nav class="bg-white shadow-lg">
        <!-- Navigation content -->
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Nos Psychologues</h1>

        <!-- Filters -->
        <div class="bg-white p-6 rounded-lg shadow-sm mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Spécialité</label>
                    <select class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent">
                        <option>Toutes les spécialités</option>
                        <option>Anxiété</option>
                        <option>Dépression</option>
                        <option>Thérapie de couple</option>
                        <option>Stress post-traumatique</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Disponibilité</label>
                    <select class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent">
                        <option>Toutes les disponibilités</option>
                        <option>Cette semaine</option>
                        <option>La semaine prochaine</option>
                        <option>Ce mois-ci</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Langue</label>
                    <select class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent">
                        <option>Toutes les langues</option>
                        <option>Français</option>
                        <option>Anglais</option>
                        <option>Espagnol</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                    <select class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent">
                        <option>Tous les prix</option>
                        <option>50€ - 75€</option>
                        <option>75€ - 100€</option>
                        <option>100€+</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Psychologists Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Psychologist Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&q=80&w=400&h=300" 
                     alt="Dr. Sophie Martin" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Dr. Sophie Martin</h3>
                        <span class="bg-pvn-green-100 text-pvn-green-600 px-3 py-1 rounded-full text-sm">
                            Disponible
                        </span>
                    </div>
                    <p class="text-gray-600 mb-4">Spécialisée en thérapie cognitive comportementale, anxiété et dépression.</p>
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="ml-2 text-gray-600">4.8 (124 avis)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-gray-900">75€</span>
                        <a href="booking-calendar.html?id=1" 
                           class="px-4 py-2 bg-pvn-green-500 text-white rounded-lg hover:bg-pvn-green-600">
                            Prendre RDV
                        </a>
                    </div>
                </div>
            </div>

            <!-- More Psychologist Cards -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&q=80&w=400&h=300" 
                     alt="Dr. Thomas Bernard" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Dr. Thomas Bernard</h3>
                        <span class="bg-pvn-green-100 text-pvn-green-600 px-3 py-1 rounded-full text-sm">
                            Disponible
                        </span>
                    </div>
                    <p class="text-gray-600 mb-4">Expert en thérapie de couple et relations familiales.</p>
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="ml-2 text-gray-600">5.0 (89 avis)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-gray-900">85€</span>
                        <a href="booking-calendar.html?id=2" 
                           class="px-4 py-2 bg-pvn-green-500 text-white rounded-lg hover:bg-pvn-green-600">
                            Prendre RDV
                        </a>
                    </div>
                </div>
            </div>

            <!-- More cards... -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-pvn-green-500 text-white mt-12">
        <!-- Footer content -->
    </footer>
</body>
</html>