@extends('layout.navpatient')
@section('title', 'Questionnaire de bien-être')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-pvn-green text-white px-6 py-4">
            <h1 class="text-2xl font-bold">Questionnaire d'évaluation émotionnelle</h1>
            <p class="mt-1">Ce questionnaire vous aidera à mieux comprendre votre état émotionnel actuel.</p>
        </div>
        
        <div class="p-6">
            <div class="mb-6 bg-pvn-light-beige p-4 rounded-lg">
                <p class="text-pvn-dark-green font-medium">Instructions :</p>
                <ul class="list-disc list-inside mt-2 text-gray-700 space-y-1">
                    <li>Répondez à toutes les questions en fonction de comment vous vous êtes senti(e) au cours des deux dernières semaines.</li>
                    <li>Il n'y a pas de bonnes ou mauvaises réponses, soyez honnête.</li>
                    <li>Vos réponses aideront votre psychologue à mieux comprendre votre état émotionnel.</li>
                </ul>
            </div>
            
            <form action="{{ route('quiz.store') }}" method="POST">
                @csrf
                
                <div class="space-y-8">
                    <!-- Section Dépression -->
                    <div>
                        <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Humeur et sentiments</h2>
                        
                        <div class="space-y-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">1. Je me sens triste ou déprimé(e)</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q1" value="0" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q1" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q1" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q1" value="3" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">2. J'ai perdu l'intérêt pour les activités que j'appréciais auparavant</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q2" value="0" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q2" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q2" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q2" value="3" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">3. J'ai des pensées négatives sur moi-même ou sur l'avenir</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q3" value="0" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q3" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q3" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q3" value="3" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section Anxiété -->
                    <div>
                        <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Inquiétudes et anxiété</h2>
                        
                        <div class="space-y-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">4. Je me sens nerveux(se), anxieux(se) ou tendu(e)</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q4" value="0" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q4" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q4" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q4" value="3" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">5. Je m'inquiète excessivement à propos de différentes choses</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q5" value="0" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q5" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q5" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q5" value="3" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">6. J'évite certaines situations par peur ou anxiété</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q6" value="0" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q6" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q6" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q6" value="3" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section Stress -->
                    <div>
                        <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Stress et tension</h2>
                        
                        <div class="space-y-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">7. Je me sens dépassé(e) par mes responsabilités</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q7" value="0" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q7" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q7" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q7" value="3" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">8. J'ai du mal à me concentrer à cause du stress</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q8" value="0" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q8" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q8" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q8" value="3" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section Bien-être -->
                    <div>
                        <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Bien-être et ressources</h2>
                        
                        <div class="space-y-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">9. Je me sens optimiste quant à l'avenir</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q9" value="3" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q9" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q9" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q9" value="0" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium mb-3">10. Je prends soin de ma santé physique et mentale</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q10" value="3" required class="text-pvn-green focus:ring-pvn-green">
                                        <span>Presque tout le temps</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q10" value="2" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Souvent</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q10" value="1" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Parfois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="q10" value="0" class="text-pvn-green focus:ring-pvn-green">
                                        <span>Jamais ou rarement</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-center">
                    <button type="submit" class="bg-pvn-green text-white px-8 py-3 rounded-md hover:bg-pvn-dark-green transition-colors font-semibold">
                        Soumettre mes réponses
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
