<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboardUser')->with('error', 'Accès non autorisé.');
        }
        return view('dashboardAdmin');
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
}