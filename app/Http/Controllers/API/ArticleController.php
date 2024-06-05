<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()
            ->with(['admin', 'comments', 'comments.user'])
            ->latest()
            ->get();

        return ArticleResource::collection($articles);
    }
}
