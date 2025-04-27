<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('psychologist.resources.index', compact('resources'));
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
        'file' => 'nullable|file|max:10240', // 10MB max
        'url' => 'nullable|url',
    ]);
  


    if ($request->hasFile('file')) {
        $validated['file_path'] = $request->file('file')->store('resources', 'public');
    }


    $validated['user_id'] = Auth::id(); 
    $validated['views'] = 0;
    $validated['downloads'] = 0;

    Resource::create($validated);

    return redirect()->route('psychologist.resources.index')
        ->with('success', 'Ressource ajoutée avec succès !');
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

        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:article,video,audio,pdf,exercise',
            'description' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'string',
            'file' => 'nullable|file|max:10240',
            'url' => 'nullable|url'
        ]);

        $resource->title = $request->title;
        $resource->type = $request->type;
        $resource->description = $request->description;
        $resource->categories = $request->categories;

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($resource->file_path) {
                Storage::disk('public')->delete($resource->file_path);
            }
            $path = $request->file('file')->store('resources', 'public');
            $resource->file_path = $path;
        }

        if ($request->has('url')) {
            $resource->url = $request->url;
        }

        $resource->save();

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
} 