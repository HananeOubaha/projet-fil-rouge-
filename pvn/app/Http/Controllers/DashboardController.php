<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Resource;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Appointment;
use App\Models\Report;
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
            'pending_reports' => Report::where('status', 'pending')->count(),
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

        // Nouveaux signalements
        $new_reports = Report::orderBy('created_at', 'desc')->take(3)->get()->map(function ($report) {
            return [
                'type' => 'report',
                'message' => 'Nouveau signalement: ' . ucfirst($report->reason),
                'time' => $report->created_at,
                'icon' => 'flag'
            ];
        });
        $recent_activity = $recent_activity->concat($new_reports);

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
        
        $psychologist = Auth::user();
        
        // Statistiques pour le tableau de bord
        $stats = [
            'total_consultations' => Appointment::where('doctor_id', $psychologist->id)
                                    ->whereMonth('appointment_date', Carbon::now()->month)
                                    ->count(),
            'satisfaction_rate' => $this->calculateSatisfactionRate($psychologist->id),
            'active_patients' => $this->getActivePatients($psychologist->id),
            'unread_messages' => 0, // À implémenter selon votre système de messagerie
        ];
        
        // Rendez-vous du jour
        $today_appointments = Appointment::with('patient')
                            ->where('doctor_id', $psychologist->id)
                            ->whereDate('appointment_date', Carbon::today())
                            ->orderBy('appointment_date')
                            ->get();
        
        // Activité récente
        $recent_activity = collect();
        
        // Nouveaux rendez-vous
        $new_appointments = Appointment::with('patient')
                            ->where('doctor_id', $psychologist->id)
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get()
                            ->map(function ($appointment) {
                                return [
                                    'type' => 'appointment',
                                    'message' => 'Nouveau rendez-vous avec ' . $appointment->patient->name,
                                    'time' => $appointment->created_at,
                                    'icon' => 'calendar-check'
                                ];
                            });
        $recent_activity = $recent_activity->concat($new_appointments);
        
        // Nouveaux commentaires sur les ressources
        $resource_ids = Resource::where('user_id', $psychologist->id)->pluck('id');
        $new_comments = Comment::whereIn('resource_id', $resource_ids)
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get()
                        ->map(function ($comment) {
                            return [
                                'type' => 'comment',
                                'message' => 'Nouveau commentaire de ' . $comment->user->name,
                                'time' => $comment->created_at,
                                'icon' => 'comment'
                            ];
                        });
        $recent_activity = $recent_activity->concat($new_comments);
        
        // Nouvelles ressources
        $new_resources = Resource::where('user_id', $psychologist->id)
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get()
                        ->map(function ($resource) {
                            return [
                                'type' => 'resource',
                                'message' => 'Nouvelle ressource publiée: ' . $resource->title,
                                'time' => $resource->created_at,
                                'icon' => 'file-alt'
                            ];
                        });
        $recent_activity = $recent_activity->concat($new_resources);
        
        // Trier par date
        $recent_activity = $recent_activity->sortByDesc('time')->take(5);
        
        // Données pour le graphique de progrès
        $progress_data = $this->getProgressData($psychologist->id);
        
        return view('dashboardPsy', compact('stats', 'today_appointments', 'recent_activity', 'progress_data', 'psychologist'));
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
        
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();
        
        // Récupérer le prochain rendez-vous
        $upcomingAppointment = Appointment::where('patient_id', $user->id)
            ->where('appointment_date', '>', now())
            ->where('status', '!=', 'cancelled')
            ->orderBy('appointment_date', 'asc')
            ->with('psychologist')
            ->first();
        
        // Récupérer les ressources recommandées
        $recommendedResources = Resource::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();
        
        // Récupérer les activités récentes
        $recentActivities = $this->getUserRecentActivities($user->id);
        
        return view('dashboardUser', compact('user', 'upcomingAppointment', 'recommendedResources', 'recentActivities'));
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
    
    private function calculateSatisfactionRate($doctor_id)
    {
        // À implémenter selon votre système d'évaluation
        // Exemple simple: moyenne des évaluations (1-5)
        return 4.8;
    }
    
    private function getActivePatients($doctor_id)
    {
        // Patients avec au moins un rendez-vous dans les 3 derniers mois
        $threeMonthsAgo = Carbon::now()->subMonths(3);
        
        $activePatientIds = Appointment::where('doctor_id', $doctor_id)
                            ->where('appointment_date', '>=', $threeMonthsAgo)
                            ->pluck('patient_id')
                            ->unique()
                            ->count();
        
        return $activePatientIds;
    }
    
    private function getProgressData($doctor_id)
    {
        $months = collect();
        $satisfaction = collect();

        // Données des 6 derniers mois
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->format('M');
            $months->push($month);
            
            // À remplacer par votre logique d'évaluation réelle
            $rating = 4.0 + (mt_rand(0, 10) / 10);
            $satisfaction->push(round($rating, 1));
        }

        return [
            'labels' => $months,
            'data' => $satisfaction
        ];
    }
    
    private function getUserRecentActivities($userId)
    {
        $activities = collect();
        
        // Récupérer les rendez-vous récents
        $appointments = Appointment::where('patient_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get()
            ->map(function ($appointment) {
                return [
                    'type' => 'appointment',
                    'message' => 'Rendez-vous ' . $appointment->status . ' avec ' . 
                                ($appointment->psychologist ? $appointment->psychologist->name : 'un psychologue'),
                    'time' => $appointment->created_at,
                    'icon' => 'calendar'
                ];
            });
        
        // Récupérer les commentaires récents
        $comments = Comment::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get()
            ->map(function ($comment) {
                return [
                    'type' => 'comment',
                    'message' => 'Commentaire sur une ressource',
                    'time' => $comment->created_at,
                    'icon' => 'comment'
                ];
            });
        
        // Récupérer les likes récents
        $likes = Like::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get()
            ->map(function ($like) {
                return [
                    'type' => 'like',
                    'message' => 'Ressource aimée',
                    'time' => $like->created_at,
                    'icon' => 'heart'
                ];
            });
        
        // Combiner et trier les activités
        $activities = $activities->concat($appointments)
                                ->concat($comments)
                                ->concat($likes)
                                ->sortByDesc('time')
                                ->take(3);
        
        return $activities;
    }
}
