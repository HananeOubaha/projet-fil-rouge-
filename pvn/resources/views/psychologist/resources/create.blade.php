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
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-pvn-dark-green hover:text-pvn-green px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>                    
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
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        
        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800">Ajouter une nouvelle ressource</h2>
            <a href="{{ route('psychologist.resources.index') }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition">
                <i class="fas fa-arrow-left"></i>
                <span>Retour</span>
            </a>
        </div>

        {{-- Body --}}
        <div class="p-6">

            {{-- Display validation errors --}}
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('psychologist.resources.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- Title & Type --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Titre</label>
                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pvn-green-300 focus:outline-none"
                            placeholder="Titre de la ressource"
                            required
                        >
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Type de ressource</label>
                        <select
                            name="type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pvn-green-300 focus:outline-none"
                            required
                        >
                            <option value="">Sélectionner un type</option>
                            @foreach(['article', 'video', 'audio', 'pdf', 'exercise'] as $type)
                                <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                {{-- Description --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Description</label>
                    <textarea
                        name="description"
                        rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pvn-green-300 focus:outline-none"
                        placeholder="Description détaillée de la ressource"
                        required
                    >{{ old('description') }}</textarea>
                </div>

                {{-- Categories --}}
                <div>
                    <label class="block mb-4 text-sm font-semibold text-gray-700">Catégories</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @php
                            $categories = ['Stress', 'Anxiété', 'Dépression', 'Méditation', 'Sommeil', 'Bien-être'];
                            $oldCategories = old('categories', []);
                        @endphp

                        @foreach($categories as $category)
                            <label class="flex items-center space-x-2">
                                <input 
                                    type="checkbox" 
                                    name="categories[]" 
                                    value="{{ $category }}" 
                                    {{ in_array($category, $oldCategories) ? 'checked' : '' }}
                                    class="text-pvn-green-500 rounded focus:ring-pvn-green-300"
                                >
                                <span class="text-gray-700">{{ $category }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- File or URL --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Fichier ou URL</label>
                    <div class="space-y-4">
                        <input
                            type="file"
                            name="file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pvn-green-300 focus:outline-none"
                        >
                        <div class="flex items-center gap-4">
                            <span class="text-gray-400">ou</span>
                            <input
                                type="url"
                                name="url"
                                value="{{ old('url') }}"
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pvn-green-300 focus:outline-none"
                                placeholder="URL de la ressource"
                            >
                        </div>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex justify-end gap-4 pt-6">
                    <a href="{{ route('psychologist.resources.index') }}" 
                       class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                        Annuler
                    </a>
                    <button type="submit" 
    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
    Publier la ressource
</button>
                </div>

            </form>

        </div>
    </div>
</div>

