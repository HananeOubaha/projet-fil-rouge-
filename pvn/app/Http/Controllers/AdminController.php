<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resource;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Statistiques pour le tableau de bord
        $stats = [
            'total_users' => User::count(),
            'total_psychologists' => User::where('role', 'psychologue')->count(),
            'pending_psychologists' => User::where('role', 'psychologue')->where('status', 'pending')->count(),
            'total_resources' => Resource::count(),
            'active_resources' => Resource::where('status', 'active')->count(),
            'total_categories' => Category::count(),
            'total_comments' => Comment::count(),
            'total_likes' => Like::count(),
        ];

        // Activité récente
        $recent_activity = collect();

        // Nouveaux utilisateurs
        $new_users = User::orderBy('created_at', 'desc')->take(3)->get()->map(function ($user) {
            return [
                'type' => 'user',
                'message' => 'Nouvel utilisateur inscrit: ' . $user->name,
                'time' => $user->created_at,
                'icon' => 'user-plus'
            ];
        });
        $recent_activity = $recent_activity->concat($new_users);

        // Nouvelles ressources
        $new_resources = Resource::orderBy('created_at', 'desc')->take(3)->get()->map(function ($resource) {
            return [
                'type' => 'resource',
                'message' => 'Nouvelle ressource publiée: ' . $resource->title,
                'time' => $resource->created_at,
                'icon' => 'file-alt'
            ];
        });
        $recent_activity = $recent_activity->concat($new_resources);

        // Nouveaux commentaires
        $new_comments = Comment::orderBy('created_at', 'desc')->take(3)->get()->map(function ($comment) {
            return [
                'type' => 'comment',
                'message' => 'Nouveau commentaire par ' . $comment->user->name,
                'time' => $comment->created_at,
                'icon' => 'comment'
            ];
        });
        $recent_activity = $recent_activity->concat($new_comments);

        // Trier par date
        $recent_activity = $recent_activity->sortByDesc('time')->take(5);

        // Psychologues en attente d'approbation
        $pending_psychologists = User::where('role', 'psychologue')
                                    ->where('status', 'pending')
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();

        // Données pour le graphique
        $user_growth = $this->getUserGrowthData();

        return view('admin.dashboard', compact('stats', 'recent_activity', 'pending_psychologists', 'user_growth'));
    }

    private function getUserGrowthData()
    {
        $months = collect();
        $counts = collect();

        // Obtenir les données des 6 derniers mois
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->format('M');
            $months->push($month);

            $count = User::whereYear('created_at', $date->year)
                        ->whereMonth('created_at', $date->month)
                        ->count();
            $counts->push($count);
        }

        return [
            'labels' => $months,
            'data' => $counts
        ];
    }

    // Gestion des psychologues
    public function psychologists()
    {
        $psychologists = User::where('role', 'psychologue')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.psychologists.index', compact('psychologists'));
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
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.categories.create');
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
        return view('admin.categories.edit', compact('category'));
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
        return view('admin.resources.index', compact('resources'));
    }

    public function toggleResourceStatus(Resource $resource)
    {
        $resource->status = $resource->status === 'active' ? 'inactive' : 'active';
        $resource->save();

        $status = $resource->status === 'active' ? 'activée' : 'désactivée';
        return redirect()->back()->with('success', "Ressource {$status} avec succès.");
    }
}
