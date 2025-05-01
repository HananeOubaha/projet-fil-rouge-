<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('psychologue')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('psychologist.resources.index', compact('resources'));
    }

    public function index1()
    {
        $resources = Resource::with('user')->paginate(9); 
        return view('ressource', compact('resources'));
    }

    public function create()
    {
        return view('psychologist.resources.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:article,video,audio,pdf,exercise',
            'description' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'string',
            'file' => 'nullable|file|max:10240',
            'url' => 'nullable|url',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('resources', 'public');
        }

        $validated['user_id'] = Auth::id(); 
        $validated['views'] = 0;
        $validated['downloads'] = 0;
        $validated['slug'] = Str::slug($request->title) . '-' . uniqid();

        Resource::create($validated);

        return redirect()->route('psychologist.resources.index')
            ->with('success', 'Ressource ajoutée avec succès !');
    }

    public function show($id)
    {
        $resource = Resource::with(['user', 'likes', 'comments.user'])
            ->findOrFail($id);
        $resource->increment('views');
        
        return view('psychologist.resources.show', compact('resource'));
    }

    public function filter(Request $request)
    {
        $query = Resource::query()->with('user');
        
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('description', 'like', '%'.$request->search.'%');
            });
        }
        
        if ($request->category) {
            $query->whereJsonContains('categories', $request->category);
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

        return view('psychologist.resources.edit', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        if ($resource->user_id !== Auth::id()) {
            return redirect()->route('psychologist.resources.index')
                ->with('error', 'Vous n\'êtes pas autorisé à modifier cette ressource.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:article,video,audio,pdf,exercise',
            'description' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'string',
            'file' => 'nullable|file|max:10240',
            'url' => 'nullable|url'
        ]);

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($resource->file_path) {
                Storage::disk('public')->delete($resource->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('resources', 'public');
        }

        if ($request->has('url')) {
            $validated['url'] = $request->url;
        }

        $resource->update($validated);

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