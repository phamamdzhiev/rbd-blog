<?php

namespace App\Http\Controllers;

use App\Models\Article;

class BlogController extends Controller
{
    public function __invoke()
    {
        $articles = Article::published()->with('comments')->latest()->paginate(20);

        return view('homepage.index', compact('articles'));
    }


    public function show(Article $article)
    {
        $article->load(['comments', 'comments.user', 'comments.children']);

        return view('blog.show', compact('article'));
    }
}
