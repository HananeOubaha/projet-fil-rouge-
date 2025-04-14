<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Forum Anonyme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'pvn-beige': '#F5F0E8',
                        '
pvn-green': '#7C9A92',
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
                    <a href="index.html" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="dashboard-user.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                    <a href="resources.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Ressources</a>
                    <a href="anonymous-forum.html" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Forum Anonyme</a>
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center text-pvn-dark-green hover:text-pvn-green">
                            <i class="fas fa-user-circle text-2xl"></i>
                            <span class="ml-2">Anonyme</span>
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
                <a href="resources.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Ressources</a>
                <a href="anonymous-forum.html" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Forum Anonyme</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Forum Header -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-pvn-dark-green mb-4">Forum Anonyme</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Un espace sûr pour partager vos pensées et recevoir du soutien. 
                    Tous les messages sont anonymes et bienveillants.
                </p>
            </div>
        </div>

        <!-- New Post Form -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Partagez votre message</h2>
            <form>
                <textarea
                    class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pvn-green"
                    rows="4"
                    placeholder="Exprimez-vous librement..."
                ></textarea>
                <div class="flex justify-between items-center mt-4">
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-pvn-green">
                            <span class="ml-2 text-gray-700">Recevoir des réponses par email</span>
                        </label>
                    </div>
                    <button type="submit" class="bg-pvn-green text-white px-6 py-2 rounded-md hover:bg-pvn-dark-green">
                        Publier anonymement
                    </button>
                </div>
            </form>
        </div>

        <!-- Messages Feed -->
        <div class="space-y-6">
            <!-- Message 1 -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">Anonyme</span>
                        <span class="text-gray-500 text-sm ml-2">Il y a 1 heure</span>
                    </div>
                    <button class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
                <p class="text-gray-700 mb-4">
                    Parfois, je me sens submergé(e) par mes responsabilités professionnelles et personnelles. 
                    J'ai l'impression de ne pas pouvoir tout gérer...
                </p>
                <div class="flex items-center space-x-4 mb-4">
                    <button class="flex items-center space-x-2 text-pvn-green hover:text-pvn-dark-green">
                        <i class="fas fa-heart"></i>
                        <span>24 soutiens</span>
                    </button>
                    <button class="flex items-center space-x-2 text-pvn-green hover:text-pvn-dark-green">
                        <i class="fas fa-comment"></i>
                        <span>12 réponses</span>
                    </button>
                </div>
                <!-- Responses -->
                <div class="space-y-4 mt-6">
                    <div class="bg-pvn-light-beige p-4 rounded-lg">
                        <div class="flex items-center mb-2">
                            <span class="font-medium text-pvn-dark-green">Dr. Marie L.</span>
                            <span class="ml-2 text-sm text-pvn-green">Psychologue certifié</span>
                        </div>
                        <p class="text-gray-700">
                            Il est normal de se sentir dépassé(e) parfois. Avez-vous essayé de faire une liste 
                            de priorités ? Cela peut aider à mieux organiser vos tâches et réduire le stress.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Message 2 -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">Anonyme</span>
                        <span class="text-gray-500 text-sm ml-2">Il y a 3 heures</span>
                    </div>
                    <button class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
                <p class="text-gray-700 mb-4">
                    Je viens de commencer une nouvelle thérapie et je me sens enfin écouté(e). 
                    C'est incroyable comme ça fait du bien de pouvoir parler librement.
                </p>
                <div class="flex items-center space-x-4">
                    <button class="flex items-center space-x-2 text-pvn-green hover:text-pvn-dark-green">
                        <i class="fas fa-heart"></i>
                        <span>42 soutiens</span>
                    </button>
                    <button class="flex items-center space-x-2 text-pvn-green hover:text-pvn-dark-green">
                        <i class="fas fa-comment"></i>
                        <span>8 réponses</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-8">
            <button class="bg-pvn-green text-white px-8 py-3 rounded-md hover:bg-pvn-dark-green">
                Voir plus de messages
            </button>
        </div>
    </div>

    <!-- Guidelines Sidebar (Fixed) -->
    <div class="fixed right-4 top-24 w-64 bg-white rounded-lg shadow-lg p-4 hidden lg:block">
        <h3 class="text-lg font-semibold text-pvn-dark-green mb-4">Règles du forum</h3>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
                <i class="fas fa-check text-pvn-green mr-2"></i>
                Restez bienveillant et respectueux
            </li>
            <li class="flex items-center">
                <i class="fas fa-check text-pvn-green mr-2"></i>
                Préservez votre anonymat
            </li>
            <li class="flex items-center">
                <i class="fas fa-check text-pvn-green mr-2"></i>
                Évitez les informations personnelles
            </li>
            <li class="flex items-center">
                <i class="fas fa-check text-pvn-green mr-2"></i>
                Signalez les contenus inappropriés
            </li>
        </ul>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>