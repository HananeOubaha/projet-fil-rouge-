@extends('layout.app')

@section('content')
<div class="bg-gradient-to-b from-white to-gray-50">
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-green-50 to-pvn-green/10 opacity-70"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative">
            <div class="text-center">
                <span class="inline-block px-3 py-1 text-sm font-medium bg-pvn-green/20 text-pvn-dark-green rounded-full mb-4 animate-fade-in-up">Nous sommes à votre écoute</span>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 animate-fade-in-up" style="animation-delay: 0.1s">Contactez-nous</h1>
                <div class="w-24 h-1 bg-pvn-green mx-auto mb-6 animate-fade-in-up" style="animation-delay: 0.2s"></div>
                <p class="max-w-2xl mx-auto text-xl text-gray-600 animate-fade-in-up" style="animation-delay: 0.3s">
                    Nous sommes là pour vous aider. N'hésitez pas à nous contacter pour toute question ou préoccupation.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Contact Form -->
            <div class="bg-white rounded-xl shadow-lg p-8 transform transition duration-500 hover:shadow-xl animate-fade-in-up" style="animation-delay: 0.4s">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Envoyez-nous un message</h2>
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                            <input type="text" name="name" id="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pvn-green focus:border-transparent transition">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                            <input type="email" name="email" id="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pvn-green focus:border-transparent transition">
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                        <input type="text" name="subject" id="subject" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pvn-green focus:border-transparent transition">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea name="message" id="message" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pvn-green focus:border-transparent transition resize-none"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-pvn-green hover:bg-pvn-dark-green text-white font-medium py-3 px-6 rounded-lg transition duration-300 transform hover:scale-[1.02] flex items-center justify-center">
                            <span>Envoyer le message</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-8 animate-fade-in-up" style="animation-delay: 0.5s">
                <div class="bg-white rounded-xl shadow-md p-8 border-l-4 border-pvn-green transform transition duration-500 hover:shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Informations de contact</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-pvn-green/20 text-pvn-dark-green">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Adresse</h3>
                                <p class="mt-1 text-gray-600">
                                    123 Avenue de la Santé Mentale<br>
                                    75000 Paris, France
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-pvn-green/20 text-pvn-dark-green">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Téléphone</h3>
                                <p class="mt-1 text-gray-600">+33 1 23 45 67 89</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-pvn-green/20 text-pvn-dark-green">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Email</h3>
                                <p class="mt-1 text-gray-600">contact@phosphenes.fr</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-pvn-green/20 text-pvn-dark-green">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Heures d'ouverture</h3>
                                <p class="mt-1 text-gray-600">
                                    Lundi - Vendredi: 9h00 - 18h00<br>
                                    Samedi: 10h00 - 15h00<br>
                                    Dimanche: Fermé
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12 animate-fade-in-up" style="animation-delay: 0.6s">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Questions fréquentes</h2>
            <p class="text-xl text-gray-600">Trouvez rapidement des réponses à vos questions</p>
        </div>
        <div class="space-y-6 animate-fade-in-up" style="animation-delay: 0.7s">
            <div class="bg-white rounded-lg shadow-md p-6 transition duration-300 hover:shadow-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Comment prendre rendez-vous avec un psychologue ?</h3>
                <p class="text-gray-600">Vous pouvez prendre rendez-vous directement depuis votre espace personnel après vous être connecté à votre compte.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 transition duration-300 hover:shadow-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Quels sont les délais de réponse ?</h3>
                <p class="text-gray-600">Nous nous efforçons de répondre à toutes les demandes dans un délai de 24 à 48 heures ouvrables.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 transition duration-300 hover:shadow-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Comment accéder aux ressources ?</h3>
                <p class="text-gray-600">Les ressources publiques sont accessibles à tous. Pour accéder aux ressources exclusives, vous devez créer un compte et vous connecter.</p>
            </div>
        </div>
    </div>

</div>
@endsection
