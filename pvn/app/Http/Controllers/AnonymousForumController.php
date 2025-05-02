<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnonymousPost;
use App\Models\AnonymousComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AnonymousForumController extends Controller
{
    public function index()
    {
        $posts = AnonymousPost::with('comments')
            ->where('is_hidden', false)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('EspaceAnonyme', compact('posts'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'notify_email' => 'boolean'
        ]);
        
        // Vérifier si le contenu est inapproprié
        if ($this->containsInappropriateContent($request->content)) {
            return redirect()->back()->with('error', 'Votre message contient du contenu inapproprié.');
        }
        
        $post = new AnonymousPost();
        $post->content = $request->content;
        $post->user_id = Auth::id(); // Stored but not displayed
        $post->anonymous_id = Str::random(10); // Generate random ID for anonymity
        $post->notify_email = $request->has('notify_email');
        $post->save();
        
        return redirect()->route('anonymous.forum')->with('success', 'Votre message a été publié anonymement.');
    }
    
    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);
        
        // Vérifier si le contenu est inapproprié
        if ($this->containsInappropriateContent($request->content)) {
            return redirect()->back()->with('error', 'Votre commentaire contient du contenu inapproprié.');
        }
        
        $post = AnonymousPost::findOrFail($postId);
        
        $comment = new AnonymousComment();
        $comment->content = $request->content;
        $comment->anonymous_post_id = $post->id;
        $comment->user_id = Auth::id();
        $comment->is_psychologist = Auth::user()->role === 'psychologue';
        $comment->save();
        
        return redirect()->route('anonymous.forum')->with('success', 'Votre réponse a été publiée.');
    }
    
    public function support($postId)
    {
        $post = AnonymousPost::findOrFail($postId);
        $post->support_count += 1;
        $post->save();
        
        return response()->json(['support_count' => $post->support_count]);
    }
    
    // Méthode pour vérifier si le contenu est inapproprié
    private function containsInappropriateContent($content)
    {
        $bannedWords = [
            'insulte', 'connard', 'connasse', 'pute', 'salope', 'enculé', 
            'fdp', 'merde', 'putain', 'con', 'conne', 'bâtard', 
            'nique', 'niquer', 'encule', 'bite', 'couille'
        ];
        
        $content = strtolower($content);
        
        foreach ($bannedWords as $word) {
            if (stripos($content, $word) !== false) {
                return true;
            }
        }
        
        return false;
    }
}
