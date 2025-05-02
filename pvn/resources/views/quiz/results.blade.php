@extends('layout.navpatient')
@section('title', 'Résultats du questionnaire')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-pvn-green text-white px-6 py-4">
            <h1 class="text-2xl font-bold">Résultats de votre évaluation émotionnelle</h1>
            <p class="mt-1">Voici l'analyse de vos réponses au questionnaire.</p>
        </div>
        
        <div class="p-6">
            <div class="mb-6 bg-pvn-light-beige p-4 rounded-lg">
                <p class="text-pvn-dark-green font-medium">Note importante :</p>
                <p class="mt-2 text-gray-700">Ces résultats sont indicatifs et ne constituent pas un diagnostic médical. Ils peuvent aider votre psychologue à mieux comprendre votre état émotionnel actuel. N'hésitez pas à en discuter lors de votre prochaine séance.</p>
            </div>
            
            <!-- Résultats détaillés -->
            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green">Résultats détaillés</h2>
                
                <!-- Dépression -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-semibold text-gray-800">Humeur et sentiments</h3>
                        <span class="px-3 py-1 rounded-full text-sm font-medium 
                            {{ $levels['depression'] === 'minimal' ? 'bg-green-100 text-green-800' : 
                              ($levels['depression'] === 'léger' ? 'bg-yellow-100 text-yellow-800' : 
                              ($levels['depression'] === 'modéré' ? 'bg-orange-100 text-orange-800' : 
                               'bg-red-100 text-red-800')) }}">
                            Niveau {{ $levels['depression'] }}
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ ($scores['depression'] / 9) * 100 }}%"></div>
                    </div>
                    <p class="mt-3 text-gray-700">
                        @if($levels['depression'] === 'minimal')
                            Votre humeur semble stable et positive. Vous ne présentez pas de signes significatifs de dépression.
                        @elseif($levels['depression'] === 'léger')
                            Vous présentez quelques signes légers qui pourraient indiquer une humeur légèrement basse. Il peut être utile d'en parler à votre psychologue.
                        @elseif($levels['depression'] === 'modéré')
                            Vous présentez plusieurs signes qui pourraient indiquer une humeur modérément basse. Il est recommandé d'en discuter avec votre psychologue.
                        @else
                            Vous présentez des signes importants qui pourraient indiquer une humeur significativement basse. Il est fortement recommandé d'en discuter avec votre psychologue.
                        @endif
                    </p>
                </div>
                
                <!-- Anxiété -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-semibold text-gray-800">Inquiétudes et anxiété</h3>
                        <span class="px-3 py-1 rounded-full text-sm font-medium 
                            {{ $levels['anxiety'] === 'minimal' ? 'bg-green-100 text-green-800' : 
                              ($levels['anxiety'] === 'léger' ? 'bg-yellow-100 text-yellow-800' : 
                              ($levels['anxiety'] === 'modéré' ? 'bg-orange-100 text-orange-800' : 
                               'bg-red-100 text-red-800')) }}">
                            Niveau {{ $levels['anxiety'] }}
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-yellow-500 h-2.5 rounded-full" style="width: {{ ($scores['anxiety'] / 9) * 100 }}%"></div>
                    </div>
                    <p class="mt-3 text-gray-700">
                        @if($levels['anxiety'] === 'minimal')
                            Vous ne semblez pas présenter de signes significatifs d'anxiété.
                        @elseif($levels['anxiety'] === 'léger')
                            Vous présentez quelques signes légers d'anxiété. Des techniques simples de relaxation pourraient vous aider.
                        @elseif($levels['anxiety'] === 'modéré')
                            Vous présentez plusieurs signes d'anxiété modérée. Il est recommandé d'en discuter avec votre psychologue.
                        @else
                            Vous présentez des signes importants d'anxiété. Il est fortement recommandé d'en discuter avec votre psychologue.
                        @endif
                    </p>
                </div>
                
                <!-- Stress -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-semibold text-gray-800">Stress et tension</h3>
                        <span class="px-3 py-1 rounded-full text-sm font-medium 
                            {{ $levels['stress'] === 'minimal' ? 'bg-green-100 text-green-800' : 
                              ($levels['stress'] === 'léger' ? 'bg-yellow-100 text-yellow-800' : 
                              ($levels['stress'] === 'modéré' ? 'bg-orange-100 text-orange-800' : 
                               'bg-red-100 text-red-800')) }}">
                            Niveau {{ $levels['stress'] }}
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-red-500 h-2.5 rounded-full" style="width: {{ ($scores['stress'] / 6) * 100 }}%"></div>
                    </div>
                    <p class="mt-3 text-gray-700">
                        @if($levels['stress'] === 'minimal')
                            Votre niveau de stress semble bien géré.
                        @elseif($levels['stress'] === 'léger')
                            Vous présentez un niveau léger de stress. Des techniques de gestion du stress pourraient vous être bénéfiques.
                        @elseif($levels['stress'] === 'modéré')
                            Vous présentez un niveau modéré de stress. Il est recommandé d'explorer des stratégies de gestion du stress avec votre psychologue.
                        @else
                            Vous présentez un niveau élevé de stress. Il est fortement recommandé d'en discuter avec votre psychologue.
                        @endif
                    </p>
                </div>
                
                <!-- Bien-être -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-semibold text-gray-800">Bien-être et ressources</h3>
                        <span class="px-3 py-1 rounded-full text-sm font-medium 
                            {{ $levels['wellbeing'] === 'excellent' ? 'bg-green-100 text-green-800' : 
                              ($levels['wellbeing'] === 'bon' ? 'bg-green-100 text-green-800' : 
                              ($levels['wellbeing'] === 'modéré' ? 'bg-yellow-100 text-yellow-800' : 
                               'bg-red-100 text-red-800')) }}">
                            Niveau {{ $levels['wellbeing'] }}
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: {{ ($scores['wellbeing'] / 6) * 100 }}%"></div>
                    </div>
                    <p class="mt-3 text-gray-700">
                        @if($levels['wellbeing'] === 'excellent')
                            Vous semblez avoir d'excellentes ressources personnelles et un bon niveau de bien-être.
                        @elseif($levels['wellbeing'] === 'bon')
                            Vous semblez avoir de bonnes ressources personnelles et un niveau satisfaisant de bien-être.
                        @elseif($levels['wellbeing'] === 'modéré')
                            Votre niveau de bien-être est modéré. Il pourrait être bénéfique de renforcer vos ressources personnelles.
                        @else
                            Votre niveau de bien-être semble faible. Il est recommandé de travailler sur le renforcement de vos ressources personnelles avec votre psychologue.
                        @endif
                    </p>
                </div>
            </div>
            
            <!-- Recommandations -->
            <div class="mt-8 bg-pvn-light-beige p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Recommandations</h2>
                <ul class="space-y-3 text-gray-700">
                    @if($scores['depression'] > 5 || $scores['anxiety'] > 5 || $scores['stress'] > 3)
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-pvn-green mt-1 mr-2"></i>
                            <span>Discutez de ces résultats avec votre psychologue lors de votre prochaine séance.</span>
                        </li>
                    @endif
                    
                    @if($scores['stress'] > 3)
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-pvn-green mt-1 mr-2"></i>
                            <span>Essayez d'intégrer des techniques de relaxation dans votre routine quotidienne (respiration profonde, méditation, yoga).</span>
                        </li>
                    @endif
                    
                    @if($scores['anxiety'] > 3)
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-pvn-green mt-1 mr-2"></i>
                            <span>Pratiquez des exercices de pleine conscience pour aider à gérer l'anxiété.</span>
                        </li>
                    @endif
                    
                    @if($scores['depression'] > 3)
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-pvn-green mt-1 mr-2"></i>
                            <span>Essayez d'intégrer plus d'activités plaisantes dans votre quotidien.</span>
                        </li>
                    @endif
                    
                    @if($scores['wellbeing'] < 3)
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-pvn-green mt-1 mr-2"></i>
                            <span>Travaillez sur le renforcement de votre réseau de soutien social.</span>
                        </li>
                    @endif
                    
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-pvn-green mt-1 mr-2"></i>
                        <span>Maintenez une activité physique régulière, une alimentation équilibrée et un sommeil suffisant.</span>
                    </li>
                    
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-pvn-green mt-1 mr-2"></i>
                        <span>Consultez les ressources disponibles dans la section "Ressources" de notre plateforme.</span>
                    </li>
                </ul>
            </div>
            
            <div class="mt-8 flex justify-center">
                <a href="{{ route('dashboardUser') }}" class="bg-pvn-green text-white px-8 py-3 rounded-md hover:bg-pvn-dark-green transition-colors font-semibold">
                    Retour au tableau de bord
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
