<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Quiz bien-être</title>
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
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Quiz Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-pvn-dark-green">Quiz bien-être</h1>
                <p class="text-gray-600 mt-2">Évaluez votre état émotionnel en répondant à ces 10 questions</p>
            </div>

            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-8">
                <div class="bg-pvn-green h-2.5 rounded-full" style="width: 10%" id="progress-bar"></div>
            </div>

            <!-- Quiz Form -->
            <form id="quiz-form" class="space-y-8">
                <!-- Question Container -->
                <div id="question-container">
                    <!-- Questions will be dynamically inserted here -->
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between">
                    <button type="button" id="prev-btn" class="hidden px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                        Précédent
                    </button>
                    <button type="button" id="next-btn" class="px-6 py-2 bg-pvn-green text-white rounded-md hover:bg-pvn-dark-green">
                        Suivant
                    </button>
                    <button type="submit" id="submit-btn" class="hidden px-6 py-2 bg-pvn-green text-white rounded-md hover:bg-pvn-dark-green">
                        Terminer
                    </button>
                </div>
            </form>

            <!-- Results Section (Initially Hidden) -->
            <div id="results-section" class="hidden space-y-8">
                <h2 class="text-2xl font-bold text-pvn-dark-green text-center">Résultats de votre évaluation</h2>
                
                <!-- Score Chart -->
                <div class="bg-pvn-light-beige p-6 rounded-lg">
                    <canvas id="resultsChart" class="w-full h-64"></canvas>
                </div>

                <!-- Recommendations -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-pvn-dark-green">Recommandations personnalisées</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="recommendations">
                        <!-- Recommendations will be dynamically inserted here -->
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-center space-x-4">
                    <button class="px-6 py-2 bg-pvn-green text-white rounded-md hover:bg-pvn-dark-green">
                        Prendre rendez-vous
                    </button>
                    <button class="px-6 py-2 border border-pvn-green text-pvn-green rounded-md hover:bg-pvn-light-beige">
                        Voir les ressources
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Quiz questions
        const questions = [
            {
                id: 1,
                text: "Comment évaluez-vous votre niveau de stress actuel ?",
                options: [
                    "Très bas",
                    "Bas",
                    "Modéré",
                    "Élevé",
                    "Très élevé"
                ]
            },
            {
                id: 2,
                text: "Comment qualifieriez-vous votre sommeil ces derniers jours ?",
                options: [
                    "Excellent",
                    "Bon",
                    "Moyen",
                    "Mauvais",
                    "Très mauvais"
                ]
            },
            {
                id: 3,
                text: "À quelle fréquence vous sentez-vous dépassé(e) par vos émotions ?",
                options: [
                    "Jamais",
                    "Rarement",
                    "Parfois",
                    "Souvent",
                    "Très souvent"
                ]
            },
            // Add more questions here
        ];

        let currentQuestion = 0;
        const answers = [];

        // DOM elements
        const questionContainer = document.getElementById('question-container');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const submitBtn = document.getElementById('submit-btn');
        const progressBar = document.getElementById('progress-bar');
        const resultsSection = document.getElementById('results-section');
        const quizForm = document.getElementById('quiz-form');

        // Display question
        function displayQuestion(questionIndex) {
            const question = questions[questionIndex];
            questionContainer.innerHTML = `
                <div class="space-y-4">
                    <h2 class="text-xl font-semibold text-pvn-dark-green">${question.text}</h2>
                    <div class="space-y-2">
                        ${question.options.map((option, index) => `
                            <div class="flex items-center">
                                <input type="radio" id="option${index}" name="question${question.id}" value="${index}"
                                    class="h-4 w-4 text-pvn-green focus:ring-pvn-green border-gray-300"
                                    ${answers[questionIndex] === index ? 'checked' : ''}>
                                <label for="option${index}" class="ml-3 text-gray-700">${option}</label>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;

            // Update progress bar
            const progress = ((questionIndex + 1) / questions.length) * 100;
            progressBar.style.width = `${progress}%`;

            // Update navigation buttons
            prevBtn.classList.toggle('hidden', questionIndex === 0);
            nextBtn.classList.toggle('hidden', questionIndex === questions.length - 1);
            submitBtn.classList.toggle('hidden', questionIndex !== questions.length - 1);
        }

        // Navigation handlers
        prevBtn.addEventListener('click', () => {
            if (currentQuestion > 0) {
                currentQuestion--;
                displayQuestion(currentQuestion);
            }
        });

        nextBtn.addEventListener('click', () => {
            const selectedOption = document.querySelector(`input[name="question${questions[currentQuestion].id}"]:checked`);
            if (selectedOption) {
                answers[currentQuestion] = parseInt(selectedOption.value);
                if (currentQuestion < questions.length - 1) {
                    currentQuestion++;
                    displayQuestion(currentQuestion);
                }
            }
        });

        // Submit handler
        quizForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const selectedOption = document.querySelector(`input[name="question${questions[currentQuestion].id}"]:checked`);
            if (selectedOption) {
                answers[currentQuestion] = parseInt(selectedOption.value);
                showResults();
            }
        });

        // Show results
        function showResults() {
            quizForm.classList.add('hidden');
            resultsSection.classList.remove('hidden');

            // Create results chart
            const ctx = document.getElementById('resultsChart').getContext('2d');
            new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: ['Stress', 'Sommeil', 'Gestion émotionnelle', 'Anxiété', 'Bien-être'],
                    datasets: [{
                        label: 'Vos résultats',
                        data: [4, 3, 2, 3, 4],
                        backgroundColor: 'rgba(124, 154, 146, 0.2)',
                        borderColor: '#7C9A92',
                        pointBackgroundColor: '#7C9A92'
                    }]
                },
                options: {
                    scales: {
                        r: {
                            beginAtZero: true,
                            max: 5
                        }
                    }
                }
            });

            // Add recommendations
            document.getElementById('recommendations').innerHTML = `
                <div class="bg-pvn-light-beige p-4 rounded-lg">
                    <h4 class="font-medium text-pvn-dark-green">Méditation guidée</h4>
                    <p class="text-gray-600 text-sm">Une séance quotidienne de 10 minutes peut réduire votre niveau de stress.</p>
                </div>
                <div class="bg-pvn-light-beige p-4 rounded-lg">
                    <h4 class="font-medium text-pvn-dark-green">Journal émotionnel</h4>
                    <p class="text-gray-600 text-sm">Notez vos émotions quotidiennes pour mieux les comprendre et les gérer.</p>
                </div>
            `;
        }

        // Initialize first question
        displayQuestion(currentQuestion);
    </script>
</body>
</html>