@extends('layout.navpsy')
@section('title', 'create')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Mes Ressources</h2>
                <a href="{{ route('psychologist.resources.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-pvn-green-500 text-white rounded-md hover:bg-pvn-green-600 transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Nouvelle ressource
                </a>
            </div>

            <div class="p-6">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @if($resources->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-lg font-medium text-gray-600">Vous n'avez pas encore ajouté de ressources.</p>
                        <a href="{{ route('psychologist.resources.create') }}" 
                           class="inline-block mt-4 px-6 py-2 text-white bg-pvn-green-500 rounded-lg hover:bg-pvn-green-600 transition-colors">
                            Ajouter votre première ressource
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-gray-600 uppercase tracking-wider">
                                <tr>
                                    <th class="px-4 py-3">Titre</th>
                                    <th class="px-4 py-3">Type</th>
                                    <th class="px-4 py-3">Catégories</th>
                                    <th class="px-4 py-3">Statistiques</th>
                                    <th class="px-4 py-3">Image</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($resources as $resource)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-4 py-2">
                                            <div class="font-medium text-gray-800">{{ $resource->title }}</div>
                                            <div class="text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($resource->created_at)->format('d/m/Y') }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                {{ $resource->type === 'article' ? 'bg-blue-100 text-blue-800' :
                                                   ($resource->type === 'video' ? 'bg-purple-100 text-purple-800' :
                                                   ($resource->type === 'audio' ? 'bg-yellow-100 text-yellow-800' :
                                                   ($resource->type === 'pdf' ? 'bg-red-100 text-red-800' :
                                                   'bg-green-100 text-green-800'))) }}">
                                                {{ ucfirst($resource->type) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="flex flex-wrap gap-1">
                                                @foreach($resource->categories as $category)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pvn-green-100 text-pvn-green-800">
                                                        {{ $category }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="text-sm text-gray-600">
                                                <div>{{ $resource->views }} vues</div>
                                                <div>{{ $resource->downloads }} téléchargements</div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2">
                                            @if($resource->file_path)
                                                <img src="{{ asset('storage/' . $resource->file_path) }}" alt="Image" class="w-16 h-16 object-cover rounded-md shadow-md">
                                            @else
                                                <span class="text-gray-500">Aucune image</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="flex space-x-3">
                                                <!-- Edit Button -->
                                                <a href="{{ route('psychologist.resources.edit', $resource) }}" 
                                                   class="text-blue-600 hover:text-blue-800 transition-colors"
                                                   title="Modifier">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                
                                                <!-- Delete Button -->
                                                <form action="{{ route('psychologist.resources.destroy', $resource) }}" 
                                                      method="POST" 
                                                      class="inline"
                                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-800 transition-colors"
                                                            title="Supprimer">
                                                        <i class="fas fa-trash-alt fa-lg"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    @if($resources->hasPages())
                        <div class="mt-6">
                            {{ $resources->links() }}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
@endsection
