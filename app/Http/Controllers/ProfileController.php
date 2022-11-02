<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function indexProfile()
    {
        return \view('layouts.admin.profile', [
            'profile' => User::latest()->first()
        ]);
    }

    public function storeProfile(Request $request)
    {
        // \dd($request);
        $request->validate(
            [
                'last_name' => 'required',
                'about' => 'required',
                'ability' => 'required',
            ],
            [
                'last_name.required' => 'The full name field is required',
            ]
        );
        // \dd($request);
        if ($request->file('profile_upload') ) {
            $image = $request->file('profile_upload');
            if (User::find($request->id)->image) {
                unlink("storage/profile/" . User::find($request->id)->image);
            }
            $image_name = "prf_" . uniqid() . "." . $image->getClientOriginalExtension();
            $upload_path = '/public/profile';
            $image->storeAs($upload_path, $image_name);

            User::updateOrCreate([
                'id' => $request->id,
            ], [
                'last_name' => $request->last_name,
                'about' => $request->about,
                'ability' => $request->ability,
                'image' => $image_name,

            ]);
        } else if (!$request->file('profile_upload')) {
            User::updateOrCreate([
                'id' => $request->id,
            ], [
                'last_name' => $request->last_name,
                'about' => $request->about,
                'ability' => $request->ability,

            ]);
        } else {
            $image = $request->file('profile_upload');
            $image_name = "prf_" . uniqid() . "." . $image->getClientOriginalExtension();
            $upload_path = '/public/profile';
            $image->storeAs($upload_path, $image_name);

            User::updateOrCreate([
                'id' => $request->id,
            ], [
                'last_name' => $request->last_name,
                'about' => $request->about,
                'ability' => $request->ability,
                'image' => $image_name,
            ]);
        }
        return redirect()->route('profile.indexProfile')
            ->with('success_message', 'Your Action Success');
    }
}
