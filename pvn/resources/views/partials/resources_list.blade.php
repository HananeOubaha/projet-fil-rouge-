@forelse($resources as $resource)
    <a href="{{ route('ressource.show', $resource) }}" class="block bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
        @if($resource->file_path)
            <div class="h-48 overflow-hidden">
                <img src="{{ asset('storage/'.$resource->file_path) }}" alt="{{ $resource->title }}" class="w-full h-full object-cover">
            </div>
        @elseif($resource->url)
            <div class="h-48 overflow-hidden">
                <img src="{{ $resource->url }}" alt="{{ $resource->title }}" class="w-full h-full object-cover">
            </div>
        @else
            <div class="h-48 bg-gray-200 flex items-center justify-center">
                <i class="fas fa-file-alt text-5xl text-gray-400"></i>
                <span class="sr-only">Aucune image disponible</span>
            </div>
        @endif
        
        <div class="p-6">
            <div class="flex items-center justify-between mb-2">
                <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">{{ ucfirst($resource->type) }}</span>
                <span class="text-gray-500 text-sm">{{ $resource->views }} vues</span>
            </div>
            <h3 class="text-xl font-semibold text-pvn-dark-green mb-2 line-clamp-2">{{ $resource->title }}</h3>
            <p class="text-gray-600 mb-2">{{ $resource->user->name }}</p>
            <p class="text-gray-600 mb-4 line-clamp-3">{{ $resource->description }}</p>
            <div class="flex flex-wrap gap-2 mb-3">
                @foreach($resource->categories as $category)
                    <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs">
                        {{ $category }}
                    </span>
                @endforeach
            </div>
            <span class="inline-flex items-center text-pvn-green hover:text-pvn-dark-green font-medium">
                Voir plus <i class="fas fa-arrow-right ml-1 text-sm"></i>
            </span>
        </div>
    </a>
@empty
    <div class="col-span-3 text-center py-8">
        <p class="text-lg text-gray-600">Aucune ressource trouvée</p>
    </div>
@endforelse