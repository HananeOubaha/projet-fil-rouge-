<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - Positive Vibes Network</title>
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
                    ✓
                </div>
                <div class="ml-2">Date & Heure</div>
            </div>
            <div class="h-1 w-16 bg-pvn-green-500"></div>
            <div class="flex items-center">
                <div class="bg-pvn-green-500 text-white w-8 h-8 rounded-full flex items-center justify-center">
                    ✓
                </div>
                <div class="ml-2">Informations</div>
            </div>
            <div class="h-1 w-16 bg-pvn-green-500"></div>
            <div class="flex items-center">
                <div class="bg-pvn-green-500 text-white w-8 h-8 rounded-full flex items-center justify-center">
                    3
                </div>
                <div class="ml-2">Paiement</div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Payment Form -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Informations de paiement</h2>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Numéro de carte
                            </label>
                            <div class="relative">
                                <input
                                    type="text"
                                    placeholder="1234 5678 9012 3456"
                                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                                >
                                <i class="fas fa-credit-card absolute left-3 top-3 text-gray-400"></i>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Date d'expiration
                                </label>
                                <input
                                    type="text"
                                    placeholder="MM/AA"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Code de sécurité
                                </label>
                                <input
                                    type="text"
                                    placeholder="CVC"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                                >
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nom sur la carte
                            </label>
                            <input
                                type="text"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pvn-green-300 focus:border-transparent"
                            >
                        </div>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Résumé</h2>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Consultation (1h)</span>
                            <span class="font-semibold">75,00 €</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">TVA (20%)</span>
                            <span class="font-semibold">15,00 €</span>
                        </div>
                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex justify-between">
                                <span class="text-lg font-semibold">Total</span>
                                <span class="text-lg font-semibold">90,00 €</span>
                            </div>
                        </div>
                    </div>

                    <button class="w-full mt-6 px-6 py-3 bg-pvn-green-500 text-white rounded-lg hover:bg-pvn-green-600">
                        Payer maintenant
                    </button>

                    <div class="mt-6 text-center text-sm text-gray-500">
                        <p>En procédant au paiement, vous acceptez nos</p>
                        <a href="#" class="text-pvn-green-500 hover:text-pvn-green-600">conditions générales d'utilisation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('button').addEventListener('click', function() {
            alert('Paiement effectué avec succès ! Vous allez recevoir un email de confirmation.');
            window.location.href = 'booking-confirmation.html';
        });
    </script>
</body>
</html>