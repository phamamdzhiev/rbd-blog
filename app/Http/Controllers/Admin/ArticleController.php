<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\Admin\ProcessArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('admin')->latest()->get();
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(ProcessArticleService $service)
    {
        try {
            $article = new Article;
            $service->process($article);
            Session::flash('success', 'Created successfully!');
            return to_route('articles.index', [], 201);
        } catch (\Throwable $e) {
            Session::flash('error', 'Error! Article not created due to: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    public function update(ProcessArticleService $service, Article $article)
    {
        try {
            $service->process($article);
            Session::flash('success', 'Edited successfully!');
            return to_route('articles.index');
        } catch (\Throwable $e) {
            Session::flash('error', 'Error! Article not updated due to: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy(Article $article)
    {
        try {
            Storage::disk('public')->delete($article->image_path);
            $article->delete();
            Session::flash('success', 'Deleted successfully!');
            return to_route('articles.index');
        } catch (\Throwable $e) {
            Session::flash('error', 'Error! Article not deleted due to: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
