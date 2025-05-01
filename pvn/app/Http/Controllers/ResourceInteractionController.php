<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceInteractionController extends Controller
{
    public function toggleLike(Resource $resource)
    {
        $user = Auth::user();
        
        if ($resource->isLikedBy($user)) {
            $resource->likes()->where('user_id', $user->id)->delete();
            $liked = false;
        } else {
            $resource->likes()->create(['user_id' => $user->id]);
            $liked = true;
        }

        return response()->json([
            'likes_count' => $resource->likes()->count(),
            'liked' => $liked
        ]);
    }

    public function storeComment(Request $request, Resource $resource)
    {
        $request->validate([
            'content' => 'required|string|max:500'
        ]);

        $comment = $resource->comments()->create([
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);

        return response()->json([
            'comment' => [
                'content' => $comment->content,
                'created_at' => $comment->created_at->diffForHumans(),
                'user' => [
                    'name' => $comment->user->name
                ]
            ],
            'comments_count' => $resource->comments()->count()
        ]);
    }
}