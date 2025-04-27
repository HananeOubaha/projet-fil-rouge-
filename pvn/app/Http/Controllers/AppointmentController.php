<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;

use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //

    public function index()
    {
        $appointments = Appointment::where('patient_id', Auth::id())
            ->with('psychologist')
            ->orderBy('appointment_date', 'asc')
            ->get();

        return view('appointment.index', compact('appointments'));
    }

    public function create()
    {
        $psychologists = User::where('role', 'psychologue')->get();
        return view('appointment.create', compact('psychologists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'psychologist_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date|after:now',
            'notes' => 'nullable|string|max:500',
        ]);

     

        $datetime = $request->appointment_date; // Exemple : '2025-04-25T15:30'

$appointment = new Appointment();
$appointment->patient_id = Auth::id();
$appointment->doctor_id = $request->psychologist_id;
$appointment->appointment_date = $datetime; // Tu peux garder la valeur complète ici si tu veux.

$appointment->appointment_time = \Carbon\Carbon::parse($datetime)->format('H:i'); // Résultat : '15:30'

$appointment->notes = $request->notes;
$appointment->status = 'pending';
$appointment->save();


return redirect()->route('appointments.show', $appointment)
->with('success', 'Rendez-vous créé avec succès !');

        
    }

    public function show(Appointment $appointment)
    {
        // $this->authorize('view', $appointment);
        return view('appointment.show', compact('appointment'));
    }

    public function cancel(Appointment $appointment)
    {
        $this->authorize('update', $appointment);
        
        $appointment->status = 'cancelled';
        $appointment->save();

        return redirect()->route('appointments.index')
            ->with('success', 'Rendez-vous annulé avec succès !');
    }
}
