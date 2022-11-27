<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class UserController extends Controller
{
    public function index()
    {
        $mytime = Carbon::now();
        $checkdate = $mytime->toDateString();
        $postDay = Article::whereDate('created_at', $checkdate)->where('status', 'publish')->count();
        return \view('layouts.admin.dashboard', [
            'messages' => Contact::latest()->take(20)->paginate(10),
            'allPost' => Article::count(),
            'postDay' => $postDay,
            'postWeek' =>  Article::whereBetween(
                'created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->count(),
            'profile' => User::latest()->first()
        ]);
    }
    public function show($id)
    {
        $request = Contact::find($id);
        return \view('email.contact_email', [
            'name' => $request->name,
            'email' => $request->email,
            'messages' => $request->message,
        ]);
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return \to_route('dashboard.index')
            ->with('success_message', 'Your Action Success');
    }
}
