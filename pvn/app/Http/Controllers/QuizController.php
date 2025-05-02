<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizResult;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index');
    }

    public function store(Request $request)
    {
        $answers = $request->except('_token');
        
        // Calculer les scores pour chaque catégorie
        $scores = [
            'depression' => 0,
            'anxiety' => 0,
            'stress' => 0,
            'wellbeing' => 0
        ];
        
        // Questions sur la dépression (1-3)
        for ($i = 1; $i <= 3; $i++) {
            if (isset($answers["q$i"])) {
                $scores['depression'] += (int)$answers["q$i"];
            }
        }
        
        // Questions sur l'anxiété (4-6)
        for ($i = 4; $i <= 6; $i++) {
            if (isset($answers["q$i"])) {
                $scores['anxiety'] += (int)$answers["q$i"];
            }
        }
        
        // Questions sur le stress (7-8)
        for ($i = 7; $i <= 8; $i++) {
            if (isset($answers["q$i"])) {
                $scores['stress'] += (int)$answers["q$i"];
            }
        }
        
        // Questions sur le bien-être (9-10)
        for ($i = 9; $i <= 10; $i++) {
            if (isset($answers["q$i"])) {
                $scores['wellbeing'] += (int)$answers["q$i"];
            }
        }
        
        // Calculer les niveaux pour chaque catégorie
        $levels = [];
        
        // Dépression (score max: 9)
        if ($scores['depression'] <= 2) {
            $levels['depression'] = 'minimal';
        } elseif ($scores['depression'] <= 5) {
            $levels['depression'] = 'léger';
        } elseif ($scores['depression'] <= 7) {
            $levels['depression'] = 'modéré';
        } else {
            $levels['depression'] = 'sévère';
        }
        
        // Anxiété (score max: 9)
        if ($scores['anxiety'] <= 2) {
            $levels['anxiety'] = 'minimal';
        } elseif ($scores['anxiety'] <= 5) {
            $levels['anxiety'] = 'léger';
        } elseif ($scores['anxiety'] <= 7) {
            $levels['anxiety'] = 'modéré';
        } else {
            $levels['anxiety'] = 'sévère';
        }
        
        // Stress (score max: 6)
        if ($scores['stress'] <= 1) {
            $levels['stress'] = 'minimal';
        } elseif ($scores['stress'] <= 3) {
            $levels['stress'] = 'léger';
        } elseif ($scores['stress'] <= 4) {
            $levels['stress'] = 'modéré';
        } else {
            $levels['stress'] = 'sévère';
        }
        
        // Bien-être (score max: 6, mais inversé - plus c'est haut, mieux c'est)
        if ($scores['wellbeing'] <= 1) {
            $levels['wellbeing'] = 'faible';
        } elseif ($scores['wellbeing'] <= 3) {
            $levels['wellbeing'] = 'modéré';
        } elseif ($scores['wellbeing'] <= 4) {
            $levels['wellbeing'] = 'bon';
        } else {
            $levels['wellbeing'] = 'excellent';
        }
        
        // Enregistrer les résultats si l'utilisateur est connecté
        if (Auth::check()) {
            QuizResult::create([
                'user_id' => Auth::id(),
                'depression_score' => $scores['depression'],
                'anxiety_score' => $scores['anxiety'],
                'stress_score' => $scores['stress'],
                'wellbeing_score' => $scores['wellbeing'],
                'answers' => json_encode($answers)
            ]);
        }
        
        return view('quiz.results', compact('scores', 'levels'));
    }
}
