<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVN - Tableau de bord Psychologue</title>
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
                    <a href="/dashboard-psychologist" class="flex items-center">
                        <i class="fas fa-heart text-pvn-green text-2xl mr-2"></i>
                        <span class="text-pvn-dark-green font-semibold text-xl">PVN</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="/dashboardPsy" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                    <a href="/psychologist/appointments" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Mes Rendez-vous</a>
                    <a href="/psychologist-patients" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">Patients</a>
                    <a href="/resources/index" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">mes ressources</a>
                    <a href="/resources/create" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">create resource</a>
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center text-pvn-dark-green hover:text-pvn-green">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                alt="Photo de profil" 
                                class="h-8 w-8 rounded-full">
                            <span class="ml-2">Dr. Lambert</span>
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
                <a href="/dashboard-psychologist" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Tableau de bord</a>
                <a href="/psychologist-appointments" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Mes Rendez-vous</a>
                <a href="/psychologist-patients" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Patients</a>
                <a href="/anonymous-forum" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Forum Anonyme</a>
                <a href="/psychologist-profile" class="block text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-base font-medium">Profil</a>
            </div>
        </div>
    </nav>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Modifier la ressource</h2>
        </div>

        <div class="p-6">
            <form action="{{ route('psychologist.resources.update', $resource) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <!-- Titre -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Titre *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $resource->title) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pvn-green focus:ring focus:ring-pvn-green focus:ring-opacity-50"
                               required>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Type -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Type *</label>
                        <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pvn-green focus:ring focus:ring-pvn-green focus:ring-opacity-50" required>
                            <option value="article" {{ old('type', $resource->type) == 'article' ? 'selected' : '' }}>Article</option>
                            <option value="video" {{ old('type', $resource->type) == 'video' ? 'selected' : '' }}>Vidéo</option>
                            <option value="audio" {{ old('type', $resource->type) == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="pdf" {{ old('type', $resource->type) == 'pdf' ? 'selected' : '' }}>PDF</option>
                            <option value="exercise" {{ old('type', $resource->type) == 'exercise' ? 'selected' : '' }}>Exercice</option>
                        </select>
                        @error('type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                        <textarea name="description" id="description" rows="4"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pvn-green focus:ring focus:ring-pvn-green focus:ring-opacity-50"
                                  required>{{ old('description', $resource->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Catégories -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Catégories *</label>
                        <div class="mt-2 space-y-2">
                            @foreach(['meditation', 'stress', 'sleep', 'anxiety', 'depression', 'relationships'] as $category)
                                <div class="flex items-center">
                                    <input id="category-{{ $category }}" name="categories[]" type="checkbox" value="{{ $category }}"
                                           class="rounded border-gray-300 text-pvn-green shadow-sm focus:border-pvn-green focus:ring focus:ring-pvn-green focus:ring-opacity-50"
                                           {{ in_array($category, old('categories', $resource->categories ?? [])) ? 'checked' : '' }}>
                                    <label for="category-{{ $category }}" class="ml-2 text-sm text-gray-700">
                                        {{ ucfirst($category) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('categories')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fichier -->
                    <div>
                        <label for="file" class="block text-sm font-medium text-gray-700">Fichier</label>
                        <input type="file" name="file" id="file"
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-pvn-green file:text-white hover:file:bg-pvn-dark-green">
                        @error('file')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if($resource->file_path)
                            <p class="mt-2 text-sm text-gray-600">
                                Fichier actuel : <a href="{{ asset('storage/'.$resource->file_path) }}" target="_blank" class="text-pvn-green hover:underline">Voir le fichier</a>
                            </p>
                        @endif
                    </div>

                    <!-- URL -->
                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                        <input type="url" name="url" id="url" value="{{ old('url', $resource->url) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-pvn-green focus:ring focus:ring-pvn-green focus:ring-opacity-50">
                        @error('url')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('psychologist.resources.index') }}"
                       class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pvn-green">
                        Annuler
                    </a>
                    <button type="submit"
                            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-pvn-green hover:bg-pvn-dark-green focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pvn-green">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
