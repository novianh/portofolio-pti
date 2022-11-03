<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class ArticleController extends Controller
{
    public function index()
    {
        return \view('layouts.admin.post', [
            'post' => Article::all()
        ]);
    }

    public function store(Request $request)
    {
        // \dd($request);
        $request->validate(
            [
                'title' => 'required|max:50',
                'slug' => 'required|unique:articles',
                'content' => 'required',
            ],
            [
                // 'last_name.required' => 'The full name field is required',
            ]
        );
        $validatedData = $request->only([
            'title', 'slug', 'content'
        ]);
        $validatedData['excerpts'] = Str::limit(strip_tags($request->content), 100);

        // \dd($validatedData);
        Article::create($validatedData);

        return \redirect()->route('post.index');
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
