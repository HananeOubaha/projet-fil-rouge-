<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceInteractionController extends Controller
{
    public function toggleLike(Resource $resource)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour aimer une ressource.');
        }
        
        // Vérifier si l'utilisateur a déjà aimé cette ressource
        $existingLike = Like::where('user_id', Auth::id())
                           ->where('resource_id', $resource->id)
                           ->first();
                           
        if ($existingLike) {
            // Si l'utilisateur a déjà aimé, on supprime le like (toggle)
            $existingLike->delete();
            
            return redirect()->back()->with('success', 'Vous n\'aimez plus cette ressource.');
        }
        
        // Créer un nouveau like
        $like = new Like();
        $like->user_id = Auth::id();
        $like->resource_id = $resource->id;
        $like->save();
        
        return redirect()->back()->with('success', 'Vous aimez cette ressource !');
    }
    
    public function storeComment(Request $request, Resource $resource)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour commenter une ressource.');
        }
        
        // Valider la requête
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);
        
        // Créer un nouveau commentaire
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->resource_id = $resource->id;
        $comment->content = $request->content;
        $comment->save();
        
        return redirect()->back()->with('success', 'Votre commentaire a été publié.');
    }
    
    public function deleteComment(Comment $comment)
    {
        // Vérifier si l'utilisateur est authentifié et est l'auteur du commentaire
        if (!Auth::check() || $comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
        }
        
        // Supprimer le commentaire
        $comment->delete();
        
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
    }
}
