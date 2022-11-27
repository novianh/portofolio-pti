<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return \view('layouts.admin.skill.skill', [
            'skills' => Skill::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:45',
                'desc' => 'required|max:500',
                'image' => 'required'
            ],
            [
                'name.required' => 'The skill name field is required',
                'desc.required' => 'The skill description field is required',
                'image.required' => 'The skill icon field is required',
            ]
        );

        $validatedData = $request->only([
            'name', 'desc'
        ]);

        $image = $request->file('image');
        $filename = "skl_" . uniqid() . "." . $image->getClientOriginalExtension();
        $stored = 'public/skill';
        $image->storeAs($stored, $filename);

        $validatedData['image'] = $filename;

        Skill::create($validatedData);

        return to_route('skill.index')->with('Create Skill Success');
    }

    public function edit($id)
    {
        return \view('layouts.admin.skill.edit', [
            'skill' => Skill::find($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);
        $request->validate(
            [
                'name' => 'required|max:45',
                'desc' => 'required|max:500',
            ],
            [
                'name.required' => 'The skill name field is required',
                'desc.required' => 'The skill description field is required',]
        );


        if($request->file('image')) {
            if ($skill->image) {
                unlink("storage/skill/" . $skill->image);
            }
            $image = $request->file('image');
            $filename = "skl_" . uniqid() . "." . $image->getClientOriginalExtension();
            $tujuan_upload = 'public/skill';
            $image->storeAs($tujuan_upload, $filename);
            $skill->update([
                'image' => $filename,
                'name' => $request->name,
                'desc' => $request->desc
            ]);
            $skill->save;
        }else {
            unset($skill['image']);
            $skill->update($request->all());
        }

        return to_route('skill.index')->with('success', 'Skill update successfully');
    }

    public function destroy($id)
    {
        // \dd($id);
        $skill = Skill::find($id);
        if ($skill->icon) {
            \unlink("storage/skill/" . $skill->image);
        }
        // dd($icon);

        $skill->delete();
        return \to_route('skill.index')
            ->with('success_message', 'Your Action Success');
    }
}
