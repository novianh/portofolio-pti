<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class ArticleController extends Controller
{
    public function index()
    {
        return \view('layouts.admin.post', [
            'post' => Article::latest()->paginate(5)
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
                'image' => 'required'
            ],
        );
        $validatedData = $request->only([
            'title', 'slug',
        ]);
        $image = $request->file('image');
        $filename = "pst_" . uniqid() . "." . $image->getClientOriginalExtension();
        $stored = 'public/post';
        $image->storeAs($stored, $filename);


        $validatedData['excerpts'] = Str::limit(strip_tags($request->content), 123);
        $validatedData['image'] = $filename;
        if ($request->status == '') {
            $validatedData['status'] = 'draft';
        } else {
            $validatedData['status'] = 'publish';
        }

        $content = $request->content;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $images) {
            $data = $images->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
        }

        $content = $dom->saveHTML();
        $validatedData['content'] = $content;

        $data = Article::create($validatedData);
        return to_route('post.index')->with('success', 'Post created successfully');
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function edit(Article $slug)
    {

        return \view('layouts.admin.post.edit', [
            'post' => $slug
        ]);
    }
    public function update(Request $request)
    {
        $post = Article::find($request->id);
        $rules =
            [
                'title' => 'required|max:50',
                'content' => 'required'
            ];

        // jika slug tidak berubah
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:articles';
        }

        // foto banner
        if ($request->image) {
            if ($post->image) {
                unlink("storage/post/" . Article::find($request->id)->image);
            }

            $image = $request->file('image');
            $filename = "pst_" . uniqid() . "." . $image->getClientOriginalExtension();
            $tujuan_upload = 'public/post';
            $image->storeAs($tujuan_upload, $filename);
        } else {
            $filename = $post->image;
        }

        // status
        if ($request->status != $post->status && $request->status == '') {
            $status = 'draft';
        } else {
            $status = 'publish';
        }

        // content
        $content = $request->content;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $images) {
            $data = $images->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
        }

        $content = $dom->saveHTML();
        $validatedData['content'] = $content;

        $validatedData = $request->validate($rules);
        $validatedData['status'] = $status;
        $validatedData['image'] = $filename;
        $validatedData['excerpts'] = Str::limit(strip_tags($request->content), 123);
        // \dd($validatedData);

        Article::where('id', $request->id)->update($validatedData);

        return to_route('post.index')->with('success', 'Post update successfully');
    }

    public function show(Request $request, Article $slug)
    {
        // \dd('kij');
        return \view('layouts.site.post', [
            'post' => $slug,
            'user' => User::latest()->first(),
            'sc' => SocialAccount::where('type', 'socmed')->get(),
            'recommends' => Article::where('status', 'publish')->where('id', '!=', $slug->id)->take(3)->get()
        ]);
    }

    public function destroy($id)
    {
        $data = Article::find($id);
        if ($data->image) {
            unlink("storage/post/" . $data->image);
        }

        $data->delete();
        return to_route('post.index')->with('success', 'Post deleted successfully');
    }
}
