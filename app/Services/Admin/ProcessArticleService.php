<?php

namespace App\Services\Admin;

use App\Http\Requests\ArticlePostRequest;
use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProcessArticleService
{
    private \App\Http\Requests\ArticlePostRequest $request;

    public function __construct(ArticlePostRequest $request)
    {
        $this->request = $request;
    }

    public function process(Article $article): void
    {
        $result = $this->request->validated();

        $article->title = $result['title'];
        $article->content = $result['content'];
        $article->admin_id = auth()->guard('admin')->id();
        $article->slug = Str::slug($result['title']);
        $article->is_published = (bool)$result['is_published'];

        if (array_key_exists('image', $result)) {
            $this->uploadImage($result['image'], $article);
        }

        $article->save();
    }

    private function uploadImage(UploadedFile $image, Article $article): void
    {
        if (!File::isDirectory(storage_path('app/public/articles'))) {
            File::makeDirectory(storage_path('app/public/articles'));
        }

        $path = $image->store('articles', 'public');

        $article->image_path = $path;
    }
}
