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
        $posts = Article::with(['admin'])->where('is_published', '=', true)->get();
        return ArticleResource::collection($posts);
    }
}
