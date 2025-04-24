<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver un rendez-vous - Positive Vibes Network</title>
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
    <div class="max-w-4xl mx-auto px-4 py-12">
        <!-- Booking Progress -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <div class="bg-pvn-green-500 text-white w-8 h-8 rounded-full flex items-center justify-center">
                    1
                </div>
                <div class="ml-2">Date & Heure</div>
            </div>
            <div class="h-1 w-16 bg-pvn-green-200"></div>
            <div class="flex items-center">
                <div class="bg-gray-200 text-gray-600 w-8 h-8 rounded-full flex items-center justify-center">
                    2
                </div>
                <div class="ml-2">Informations</div>
            </div>
            <div class="h-1 w-16 bg-gray-200"></div>
            <div class="flex items-center">
                <div class="bg-gray-200 text-gray-600 w-8 h-8 rounded-full flex items-center justify-center">
                    3
                </div>
                <div class="ml-2">Paiement</div>
            </div>
        </div>

        <!-- Psychologist Info -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="flex items-center">
                <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&q=80&w=96&h=96" 
                     alt="Dr. Sophie Martin" 
                     class="w-24 h-24 rounded-full object-cover">
                <div class="ml-6">
                    <h1 class="text-2xl font-bold text-gray-900">Dr. Sophie Martin</h1>
                    <p class="text-gray-600">Psychologue clinicienne</p>
                    <div class="flex items-center mt-2">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="ml-2 text-gray-600">4.8 (124 avis)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-6">Sélectionnez une date</h2>
            <div class="grid grid-cols-7 gap-2">
                <!-- Calendar Header -->
                <div class="text-center font-semibold text-gray-600">Lun</div>
                <div class="text-center font-semibold text-gray-600">Mar</div>
                <div class="text-center font-semibold text-gray-600">Mer</div>
                <div class="text-center font-semibold text-gray-600">Jeu</div>
                <div class="text-center font-semibold text-gray-600">Ven</div>
                <div class="text-center font-semibold text-gray-600">Sam</div>
                <div class="text-center font-semibold text-gray-600">Dim</div>
                
                <!-- Calendar Days -->
                <div class="text-center p-2 text-gray-400">29</div>
                <div class="text-center p-2 text-gray-400">30</div>
                <div class="text-center p-2 text-gray-400">31</div>
                <div class="text-center p-2 cursor-pointer hover:bg-pvn-green-50 rounded-lg">1</div>
                <div class="text-center p-2 cursor-pointer hover:bg-pvn-green-50 rounded-lg">2</div>
                <div class="text-center p-2 cursor-pointer hover:bg-pvn-green-50 rounded-lg">3</div>
                <div class="text-center p-2 cursor-pointer hover:bg-pvn-green-50 rounded-lg">4</div>
                <div class="text-center p-2 cursor-pointer hover:bg-pvn-green-50 rounded-lg">5</div>
                <div class="text-center p-2 cursor-pointer hover:bg-pvn-green-50 rounded-lg">6</div>
                <div class="text-center p-2 cursor-pointer hover:bg-pvn-green-50 rounded-lg">7</div>
                <div class="text-center p-2 cursor-pointer hover:bg-pvn-green-50 rounded-lg">8</div>
                <div class="text-center p-2 bg-pvn-green-500 text-white rounded-lg cursor-pointer">9</div>
                <div class="text-center p-2 cursor-pointer hover:bg-pvn-green-50 rounded-lg">10</div>
                <!-- More days... -->
            </div>
        </div>

        <!-- Time Slots -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-6">Sélectionnez un horaire</h2>
            <div class="grid grid-cols-3 gap-4">
                <button class="p-4 text-center border border-gray-200 rounded-lg hover:bg-pvn-green-50">
                    09:00
                </button>
                <button class="p-4 text-center border border-gray-200 rounded-lg hover:bg-pvn-green-50">
                    10:00
                </button>
                <button class="p-4 text-center border border-gray-200 rounded-lg hover:bg-pvn-green-50">
                    11:00
                </button>
                <button class="p-4 text-center border border-gray-200 rounded-lg hover:bg-pvn-green-50">
                    14:00
                </button>
                <button class="p-4 text-center border border-gray-200 rounded-lg hover:bg-pvn-green-50">
                    15:00
                </button>
                <button class="p-4 text-center border border-gray-200 rounded-lg hover:bg-pvn-green-50">
                    16:00
                </button>
            </div>
        </div>

        <!-- Next Step Button -->
        <div class="flex justify-end">
            <a href="booking-info.html" 
               class="px-6 py-3 bg-pvn-green-500 text-white rounded-lg hover:bg-pvn-green-600">
                Continuer
            </a>
        </div>
    </div>
</body>
</html>