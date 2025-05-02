<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\AnonymousPost;
use App\Models\AnonymousComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'reportable_type' => 'required|in:post,comment',
            'reportable_id' => 'required|integer',
            'reason' => 'required|string|max:255',
            'details' => 'nullable|string|max:1000',
        ]);

        $report = new Report();
        $report->user_id = Auth::id();
        $report->reason = $request->reason;
        $report->details = $request->details;
        $report->status = 'pending';

        if ($request->reportable_type === 'post') {
            $post = AnonymousPost::findOrFail($request->reportable_id);
            $report->anonymous_post_id = $post->id;
        } else {
            $comment = AnonymousComment::findOrFail($request->reportable_id);
            $report->anonymous_comment_id = $comment->id;
        }

        $report->save();

        return response()->json([
            'success' => true,
            'message' => 'Merci pour votre signalement. Notre équipe va l\'examiner.'
        ]);
    }

    public function index()
    {
        // Vérifier si l'utilisateur est un administrateur
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboardUser')->with('error', 'Accès non autorisé.');
        }

        $reports = Report::with(['post', 'comment', 'user'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('admin.reports.index', compact('reports'));
    }

    public function show(Report $report)
    {
        // Vérifier si l'utilisateur est un administrateur
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboardUser')->with('error', 'Accès non autorisé.');
        }

        return view('admin.reports.show', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        // Vérifier si l'utilisateur est un administrateur
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboardUser')->with('error', 'Accès non autorisé.');
        }

        $request->validate([
            'status' => 'required|in:reviewed,resolved,dismissed',
            'action' => 'nullable|in:none,hide,delete',
        ]);

        $report->status = $request->status;
        $report->reviewed_by = Auth::id();
        $report->reviewed_at = now();
        $report->save();

        // Prendre des mesures sur le contenu signalé
        if ($request->action === 'hide') {
            if ($report->anonymous_post_id) {
                $post = AnonymousPost::find($report->anonymous_post_id);
                if ($post) {
                    $post->is_hidden = true;
                    $post->save();
                }
            } elseif ($report->anonymous_comment_id) {
                $comment = AnonymousComment::find($report->anonymous_comment_id);
                if ($comment) {
                    $comment->is_hidden = true;
                    $comment->save();
                }
            }
        } elseif ($request->action === 'delete') {
            if ($report->anonymous_post_id) {
                AnonymousPost::destroy($report->anonymous_post_id);
            } elseif ($report->anonymous_comment_id) {
                AnonymousComment::destroy($report->anonymous_comment_id);
            }
        }

        return redirect()->route('admin.reports.index')->with('success', 'Signalement traité avec succès.');
    }
}
