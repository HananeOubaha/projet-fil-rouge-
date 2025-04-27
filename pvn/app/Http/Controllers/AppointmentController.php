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

        $appointment = new Appointment();
        $appointment->patient_id = Auth::id();
        $appointment->doctor_id = $request->psychologist_id;
        $appointment->appointment_date = $request->appointment_date;
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
        // Vérifier si l'utilisateur connecté est le patient du rendez-vous
        if ($appointment->patient_id !== Auth::id()) {
            return redirect()->route('appointments.index')
                ->with('error', 'Vous n\'êtes pas autorisé à annuler ce rendez-vous.');
        }
        
        $appointment->status = 'cancelled';
        $appointment->save();

        return redirect()->route('appointments.index')
            ->with('success', 'Rendez-vous annulé avec succès !');
    }
}
