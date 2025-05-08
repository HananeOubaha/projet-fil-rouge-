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
       
    }
}
