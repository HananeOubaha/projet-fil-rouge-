@extends('layout.navAdmin')
@section('title', 'Détails du Signalement')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-pvn-dark-green">Détails du Signalement</h1>
                <p class="text-gray-600">Examen et traitement du contenu signalé</p>
            </div>
            <a href="{{ route('admin.reports.index') }}" class="bg-gray-200 text-pvn-dark-green px-4 py-2 rounded-md hover:bg-gray-300">
                Retour à la liste
            </a>
        </div>
    </div>

    <!-- Notifications -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Report Details -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Informations</h2>
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-500">Type</p>
                        <p class="font-medium">{{ $report->anonymous_post_id ? 'Message' : 'Commentaire' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Raison</p>
                        <p class="font-medium">{{ ucfirst($report->reason) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Signalé par</p>
                        <p class="font-medium">{{ $report->user->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Date</p>
                        <p class="font-medium">{{ $report->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Statut</p>
                        <p class="font-medium">
                            @if($report->status === 'pending')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    En attente
                                </span>
                            @elseif($report->status === 'reviewed')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Examiné
                                </span>
                            @elseif($report->status === 'resolved')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Résolu
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Rejeté
                                </span>
                            @endif
                        </p>
                    </div>
                    @if($report->details)
                    <div>
                        <p class="text-sm text-gray-500">Détails</p>
                        <p class="font-medium">{{ $report->details }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Reported Content -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Contenu Signalé</h2>
                <div class="bg-pvn-light-beige p-4 rounded-lg mb-6">
                    @if($report->anonymous_post_id)
                        <div class="mb-2">
                            <span class="text-sm text-gray-500">Posté par:</span>
                            <span class="font-medium">Anonyme</span>
                        </div>
                        <p class="text-gray-800">{{ $report->post->content }}</p>
                    @else
                        <div class="mb-2">
                            <span class="text-sm text-gray-500">Commenté par:</span>
                            <span class="font-medium">
                                @if($report->comment->is_psychologist)
                                    Dr. {{ $report->comment->user->name }} (Psychologue)
                                @else
                                    Anonyme
                                @endif
                            </span>
                        </div>
                        <p class="text-gray-800">{{ $report->comment->content }}</p>
                    @endif
                </div>

                <!-- Action Form -->
                <form action="{{ route('admin.reports.update', $report) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                            <select id="status" name="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-pvn-green focus:border-pvn-green sm:text-sm rounded-md">
                                <option value="reviewed" {{ $report->status === 'reviewed' ? 'selected' : '' }}>Examiné</option>
                                <option value="resolved" {{ $report->status === 'resolved' ? 'selected' : '' }}>Résolu</option>
                                <option value="dismissed" {{ $report->status === 'dismissed' ? 'selected' : '' }}>Rejeté</option>
                            </select>
                        </div>
                        <div>
                            <label for="action" class="block text-sm font-medium text-gray-700">Action</label>
                            <select id="action" name="action" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-pvn-green focus:border-pvn-green sm:text-sm rounded-md">
                                <option value="none">Aucune action</option>
                                <option value="hide">Masquer le contenu</option>
                                <option value="delete">Supprimer le contenu</option>
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green">
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
