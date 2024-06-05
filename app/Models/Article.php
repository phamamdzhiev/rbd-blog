<?php

namespace App\Models;

use App\Models\Admin\Admin;

class Article extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'title',
        'content',
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

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
