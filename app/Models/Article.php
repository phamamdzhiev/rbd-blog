<?php

namespace App\Models;

use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'is_published',
        'image_path'
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
