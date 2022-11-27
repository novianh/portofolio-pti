<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use Illuminate\Http\Request;

class SocialAccountController extends Controller
{
    public function index()
    {
        return \view('layouts.admin.social.social', [
            'accounts' => SocialAccount::all()
        ]);
    }

    public function store(Request $request)
    {
        // \dd($request);
        $request->validate(
            [
                'name' => 'required|max:45',
                'url' => 'required'
            ],
            [
                'name.required' => 'The project name field is required',
                'url.required' => 'The project url field is required',
            ]
        );
        $validatedData = $request->all();
        $nonsm = "address,phone,email";
        $arrNosm = explode(',', $nonsm);

            if ( 'address'== $request->name || 'phone'== $request->name||'email'== $request->name) {
                $type = 'non socmed';
            } elseif($request->name !== $arrNosm){
                $type = 'socmed';
            }
        

        $validatedData['type'] = $type; 

        SocialAccount::create($validatedData);

        return to_route('sc.index')->with('Create Data Success');
    }

    public function edit(Request $request, $id)
    {
        return \view('layouts.admin.social.edit', [
            'account' => SocialAccount::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $sc = SocialAccount::find($id);
        $request->validate(
            [
                'name' => 'required|max:45',
                'type' => 'required',
                'url' => 'required'
            ],
            [
                'name.required' => 'The project name field is required',
                'type.required' => 'The project type field is required',
                'url.required' => 'The project url field is required',
            ]
        );

        $sc->update($request->all());

        return to_route('sc.index')->with('success', 'Data update successfully');
    }

    // public function show(Request $request)
    // {
    //     # code...
    // }


    public function destroy($id)
    {
        // \dd($id);
        $sc = SocialAccount::find($id);

        $sc->delete();
        return \to_route('sc.index')
            ->with('success_message', 'Your Action Success');
    }
}
