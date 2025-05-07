<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Traite la soumission du formulaire de contact
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Ici, vous pouvez envoyer un email (décommentez quand vous aurez configuré Mail)
            // Mail::to('contact@phosphenes.fr')->send(new ContactFormMail($validated));
            
            // Ou simplement enregistrer le message dans les logs
            Log::info('Nouveau message de contact reçu', $validated);
            
            return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi du message de contact', [
                'error' => $e->getMessage(),
                'data' => $validated
            ]);
            
            return redirect()->route('contact')->with('error', 'Une erreur est survenue lors de l\'envoi de votre message. Veuillez réessayer ultérieurement.')->withInput();
        }
    }
}
