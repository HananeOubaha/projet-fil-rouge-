<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsychologistAppointmentController extends Controller
{
    /**
     * Afficher la liste des rendez-vous du psychologue
     */
    public function index()
    {
        // Récupérer tous les rendez-vous du psychologue connecté
        $appointments = Appointment::where('doctor_id', Auth::id())
            ->with('patient')
            ->orderBy('appointment_date', 'asc')
            ->get();

        return view('psychologist.appointments.index', compact('appointments'));
    }

    /**
     * Afficher les détails d'un rendez-vous
     */
    public function show(Appointment $appointment)
    {
        // Vérifier si le rendez-vous appartient au psychologue connecté
        if ($appointment->doctor_id !== Auth::id()) {
            return redirect()->route('psychologist.appointments.index')
                ->with('error', 'Vous n\'êtes pas autorisé à voir ce rendez-vous.');
        }

        return view('psychologist.appointments.show', compact('appointment'));
    }

    /**
     * Mettre à jour le statut d'un rendez-vous
     */
    public function updateStatus(Request $request, Appointment $appointment)
    {
        // Vérifier si le rendez-vous appartient au psychologue connecté
        if ($appointment->doctor_id !== Auth::id()) {
            return redirect()->route('psychologist.appointments.index')
                ->with('error', 'Vous n\'êtes pas autorisé à modifier ce rendez-vous.');
        }

        // Valider le statut
        $request->validate([
            'status' => 'required|in:confirmed,cancelled'
        ]);

        $appointment->status = $request->status;
        $appointment->save();

        $message = $request->status === 'confirmed' 
            ? 'Rendez-vous confirmé avec succès !'
            : 'Rendez-vous annulé avec succès !';

        return redirect()->route('psychologist.appointments.show', $appointment)
            ->with('success', $message);
    }
}
