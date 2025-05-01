<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resource;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Gestion des psychologues
    public function psychologists()
    {
        $psychologists = User::where('role', 'psychologue')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.manage_psychologists.index', compact('psychologists'));
    }

    public function approvePsychologist(User $user)
    {
        $user->status = 'approved';
        $user->approved_at = now();
        $user->save();

        return redirect()->back()->with('success', 'Psychologue approuvé avec succès.');
    }

    public function rejectPsychologist(User $user)
    {
        $user->status = 'rejected';
        $user->save();

        return redirect()->back()->with('success', 'Psychologue rejeté avec succès.');
    }

    // Gestion des catégories
    public function categories()
    {
        $categories = Category::orderBy('nom')->paginate(10);
        return view('admin.manage_categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.manage_categories.create');
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string'
        ]);

        Category::create($validated);

        return redirect()->route('admin.categories')->with('success', 'Catégorie créée avec succès.');
    }

    public function editCategory(Category $category)
    {
        return view('admin.manage_categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:categories,nom,' . $category->id,
            'description' => 'nullable|string'
        ]);

        $category->update($validated);

        return redirect()->route('admin.categories')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Catégorie supprimée avec succès.');
    }

    // Gestion des ressources
    public function resources()
    {
        $resources = Resource::with('user')->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
        return view('admin.manage_resources.index', compact('resources', 'categories'));
    }

    public function toggleResourceStatus(Resource $resource)
    {
        $resource->status = $resource->status === 'active' ? 'inactive' : 'active';
        $resource->save();

        $status = $resource->status === 'active' ? 'activée' : 'désactivée';
        return redirect()->back()->with('success', "Ressource {$status} avec succès.");
    }
}