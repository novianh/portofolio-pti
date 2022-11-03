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
            'post' => Article::latest()->get()
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
        $image = $request->file('image');
        $filename = "pst_" . uniqid() . "." . $image->getClientOriginalExtension();
        $tujuan_upload = 'public/post';
        $image->storeAs($tujuan_upload, $filename);


        $validatedData['excerpts'] = Str::limit(strip_tags($request->content), 100);
        $validatedData['image'] = $filename;


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
