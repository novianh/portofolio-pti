<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function index()
    {
        return \view('layouts.site.index', [
            'profile' => User::latest()->first(),
            'posts' => Article::where('status', 'publish')->take(3)->get(),
            'projects' => Project::all(),
            'skills' => Skill::all(),
            'exps' => Job::all(),
            'nsc' => SocialAccount::where('type', 'non socmed')->get(),
            'sc' => SocialAccount::where('type', 'socmed')->get(),
            // 'phone' => SocialAccount::where('name', 'hp')->latest(),
            // 'email' => SocialAccount::where('name', 'email')->latest(),
        ]);
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        Mail::send(
            'email.contact_email',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'messages' => $request->message,
            ),
            function ($message) use ($request) {
                $message->from($request->email);
                $message->to('Me@gmail.com');
                $message->subject('Portofolio');
            }
        );

        return \to_route('site.index')
            ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }

    public function blog()
    {
        return \view('layouts.site.allPosts', [
            'posts' => Article::where('status', 'publish')->paginate(10),
            'sc' => SocialAccount::where('type', 'socmed')->get(),
        ]);
    }
}
