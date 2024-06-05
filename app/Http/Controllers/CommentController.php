<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required|string|max:2000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->article_id = $article->id;
        $comment->user_id = Auth::guard('web')->id();
        $comment->parent_id = $request->input('parent_id', null);
        $comment->save();

        return redirect()->back()->with('success', 'Your comment has been added successfully');
    }
}
