<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation - Positive Vibes Network</title>
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
        <div class="bg-white rounded-lg shadow-sm p-8 text-center">
            <div class="w-20 h-20 bg-pvn-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-check text-4xl text-pvn-green-500"></i>
            </div>
            
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Réservation confirmée !</h1>
            <p class="text-gray-600 mb-8">
                Votre rendez-vous avec Dr. Sophie Martin a été confirmé.
                Un email de confirmation vous a été envoyé.
            </p>

            <div class="bg-pvn-green-50 rounded-lg p-6 mb-8">
                <div class="grid grid-cols-2 gap-4 text-left">
                    <div>
                        <p class="text-sm text-gray-600">Date</p>
                        <p class="font-semibold">Jeudi 9 Mars 2025</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Heure</p>
                        <p class="font-semibold">14:00 - 15:00</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Type de consultation</p>
                        <p class="font-semibold">Vidéo consultation</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Numéro de réservation</p>
                        <p class="font-semibold">#PVN123456</p>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <a href="#" class="block w-full px-6 py-3 bg-pvn-green-500 text-white rounded-lg hover:bg-pvn-green-600">
                    Ajouter à mon calendrier
                </a>
                <a href="/dashboard" class="block w-full px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                    Retour au tableau de bord
                </a>
            </div>
        </div>
    </div>
</body>
</html>