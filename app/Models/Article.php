<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'excerpts',
        'image',
        'content',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 'draft') {
            return '<span class="bg-orange-100 text-orange-800 text-xs font-semibold mr-2 px-2 py-1 rounded dark:bg-orange-200 dark:text-orange-900">Draft</span>';
        }
        return '<span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2 py-1 rounded dark:bg-green-200 dark:text-green-900">Published</span>';
    }

    //Post.php
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
