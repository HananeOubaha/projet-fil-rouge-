@extends('layout.app')
@section('title', 'Home')

@section('content')

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-pvn-dark-green mb-4">Ressources bien-être</h1>
            <p class="text-xl text-gray-600">Découvrez notre collection de ressources pour votre développement personnel</p>
        </div>

        <!-- Search and Filters -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <input type="text" placeholder="Rechercher une ressource..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                </div>
                <div>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                        <option value="">Toutes les catégories</option>
                        <option value="meditation">Méditation</option>
                        <option value="stress">Gestion du stress</option>
                        <option value="sleep">Sommeil</option>
                        <option value="anxiety">Anxiété</option>
                    </select>
                </div>
                <div>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                        <option value="">Tous les formats</option>
                        <option value="article">Articles</option>
                        <option value="video">Vidéos</option>
                        <option value="podcast">Podcasts</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Resources Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($resources as $resource)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    @if($resource->file_path)
                        <img src="{{ asset('storage/'.$resource->file_path) }}" alt="{{ $resource->title }}" class="w-full h-48 object-cover">
                    @elseif($resource->url)
                        <img src="{{ $resource->url }}" alt="{{ $resource->title }}" class="w-full h-48 object-cover">
                    @else
                        <img src="https://via.placeholder.com/1000x500" alt="Default Image" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">{{ ucfirst($resource->type) }}</span>
                            <span class="text-gray-500 text-sm">{{ $resource->views }} vues</span>
                        </div>
                        <h3 class="text-xl font-semibold text-pvn-dark-green mb-2">{{ $resource->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($resource->description, 150) }}</p>
                        {{-- <a href="{{ route('resources.show', $resource->id) }}" class="text-pvn-green hover:text-pvn-dark-green font-medium">Lire plus →</a> --}}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-8">
            <button class="bg-pvn-green text-white px-8 py-3 rounded-md hover:bg-pvn-dark-green">
                Charger plus de ressources
            </button>
        </div>
    </div>
@endsection
