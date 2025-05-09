<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('categories')->get();
        
        return view('psychologist.resources.index', compact('resources'));
    }

    public function index1()
    {
        $resources = Resource::with(['user', 'categories'])->paginate(9); 
        return view('ressource', compact('resources'));
    }

    public function create()
    {
        $categories = Category::orderBy('nom')->get();
        return view('psychologist.resources.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:article,video,audio,pdf,exercise',
            'description' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id', // Changé pour valider les IDs
            'file' => 'nullable|file|max:10240',
            'url' => 'nullable|url',
        ]);
    
        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('resources', 'public');
        }
    
        $validated['user_id'] = Auth::id();
    
        // Créer la ressource
        $resource = Resource::create(Arr::except($validated, ['categories']));
    
        // Attacher les catégories à la ressource
        $resource->categories()->attach($request->categories);
    
        return redirect()->route('psychologist.resources.index')
            ->with('success', 'Ressource ajoutée avec succès !');
    }

    public function show($id)
    {
        $resource = Resource::with(['user', 'categories', 'likes', 'comments.user'])
            ->findOrFail($id);
        $resource->increment('views');
        
        return view('psychologist.resources.show', compact('resource'));
    }

    public function filter(Request $request)
    {
        $query = Resource::query()->with(['user', 'categories']);
        
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('description', 'like', '%'.$request->search.'%');
            });
        }
        
        if ($request->category) {
            // Utiliser whereHas pour filtrer par catégorie
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('nom', $request->category);
            });
        }
        
        if ($request->type) {
            $query->where('type', $request->type);
        }
        
        $resources = $query->orderBy('created_at', 'desc')
                          ->paginate(9);

        return response()->json([
            'html' => view('partials.resources_list', ['resources' => $resources])->render(),
            'hasMore' => $resources->hasMorePages()
        ]);
    }

    public function edit(Resource $resource)
    {
        if ($resource->user_id !== Auth::id()) {
            return redirect()->route('psychologist.resources.index')
                ->with('error', 'Vous n\'êtes pas autorisé à modifier cette ressource.');
        }

        $categories = Category::orderBy('nom')->get();
        return view('psychologist.resources.edit', compact('resource', 'categories'));
    }

    public function update(Request $request, Resource $resource)
    {
        // Vérifier si l'utilisateur est autorisé à modifier cette ressource
        if ($resource->user_id !== Auth::id()) {
            return redirect()->route('psychologist.resources.index')
                ->with('error', 'Vous n\'êtes pas autorisé à modifier cette ressource.');
        }
    
        // Valider les données du formulaire
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:article,video,audio,pdf,exercise',
            'description' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id', // Changé pour valider les IDs
            'file' => 'nullable|file|max:10240',
            'url' => 'nullable|url'
        ]);
    
        // Gérer le fichier : si un fichier est téléchargé, le supprimer l'ancien et enregistrer le nouveau
        if ($request->hasFile('file')) {
            // Supprimer l'ancien fichier si existant
            if ($resource->file_path) {
                Storage::disk('public')->delete($resource->file_path);
            }
            // Enregistrer le nouveau fichier
            $validated['file_path'] = $request->file('file')->store('resources', 'public');
        }
    
        // Mettre à jour l'URL si elle est présente dans la demande
        if ($request->has('url')) {
            $validated['url'] = $request->url;
        }
    
        // Mettre à jour la ressource avec les données validées
        $resource->update(Arr::except($validated, ['categories']));
    
        // Synchroniser les catégories avec la ressource
        $resource->categories()->sync($request->categories);
    
        // Rediriger avec un message de succès
        return redirect()->route('psychologist.resources.index')
            ->with('success', 'Ressource mise à jour avec succès !');
    }

    public function destroy(Resource $resource)
    {
        if ($resource->user_id !== Auth::id()) {
            return redirect()->route('psychologist.resources.index')
                ->with('error', 'Vous n\'êtes pas autorisé à supprimer cette ressource.');
        }

        if ($resource->file_path) {
            Storage::disk('public')->delete($resource->file_path);
        }

        $resource->delete();

        return redirect()->route('psychologist.resources.index')
            ->with('success', 'Ressource supprimée avec succès !');
    }

    public function download(Resource $resource)
    {
        if (!Storage::disk('public')->exists($resource->file_path)) {
            return back()->with('error', 'Le fichier n\'existe pas.');
        }

        $resource->increment('downloads');
        
        return Storage::disk('public')->download(
            $resource->file_path, 
            Str::slug($resource->title) . '.' . pathinfo($resource->file_path, PATHINFO_EXTENSION)
        );
    }
}