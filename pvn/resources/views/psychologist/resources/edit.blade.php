@extends('layout.navpsy')
@section('title', 'create')

@section('content')
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
                        @php
                            // Récupérer les catégories directement si elles ne sont pas fournies
                            $categoriesList = isset($categories) ? $categories : \App\Models\Category::orderBy('nom')->get();
                            // Récupérer les IDs des catégories déjà associées à cette ressource
                            $resourceCategoryIds = $resource->categories->pluck('id')->toArray();
                        @endphp
                        
                        @foreach($categoriesList as $category)
                            <div class="flex items-center">
                                <input id="category-{{ $category->id }}" name="categories[]" type="checkbox" value="{{ $category->id }}"
                                       class="rounded border-gray-300 text-pvn-green shadow-sm focus:border-pvn-green focus:ring focus:ring-pvn-green focus:ring-opacity-50"
                                       {{ in_array($category->id, old('categories', $resourceCategoryIds)) ? 'checked' : '' }}>
                                <label for="category-{{ $category->id }}" class="ml-2 text-sm text-gray-700">
                                    {{ $category->nom }}
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
@endsection