<?php

namespace Database\Factories;

use App\Models\Admin\Admin;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        $adminId = Admin::first()->id;

        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'slug' => Str::slug($this->faker->sentence),
            'image_path' => $this->faker->imageUrl(),
            'admin_id' => $adminId
        ];
    }
}
