<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __invoke()
    {
        $articles = Article::published()->latest()->get();

        return view('homepage.index', compact('articles'));
    }


    public function show(Article $article)
    {
        return view('blog.show', compact('article'));
    }
}
