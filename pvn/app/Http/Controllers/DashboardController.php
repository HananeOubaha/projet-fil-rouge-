<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Resource;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboardUser')->with('error', 'Accès non autorisé.');
        }
        
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

        return view('dashboardAdmin', compact('stats', 'recent_activity', 'pending_psychologists', 'user_growth'));
    }

    public function dashboardPsy()
    {
        if (Auth::user()->role !== 'psychologue') {
            return redirect()->route('dashboardUser')->with('error', 'Accès non autorisé.');
        }
        return view('dashboardPsy');
    }

    public function dashboardUser()
    {
        if (Auth::user()->role !== 'patient') {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboardAdmin');
            } elseif (Auth::user()->role === 'psychologue') {
                return redirect()->route('dashboardPsy');
            }
        }
        return view('dashboardUser');
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
}