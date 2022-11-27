<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('layouts.admin.project.project', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // \dd($request);
        $request->validate(
            [
                'name' => 'required|max:45',
                'image' => 'required',
                'url' => 'required'
            ],
            [
                'name.required' => 'The project name field is required',
                'image.required' => 'The project image field is required',
            ]
        );


        $validatedData = $request->only([
            'name', 'url'
        ]);

        $image = $request->file('image');
        $filename = "prj_" . uniqid() . "." . $image->getClientOriginalExtension();
        $stored = 'public/project';
        $image->storeAs($stored, $filename);

        $validatedData['image'] = $filename;

        Project::create($validatedData);

        return to_route('project.index')->with('Create Project Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return \view('layouts.admin.project.edit', [
            'project' => Project::find($id),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // \dd($request);
        $project = project::find($project->id);
        $request->validate(
            [
                'name' => 'required|max:45',
                'url' => 'required|max:500',
            ],
            [
                'name.required' => 'The project name field is required',
                'url.required' => 'The project url field is required',
            ]
        );


        if ($request->file('image')) {
            if ($project->image) {
                unlink("storage/project/" . $project->image);
            }
            $image = $request->file('image');
            $filename = "prj_" . uniqid() . "." . $image->getClientOriginalExtension();
            $tujuan_upload = 'public/project';
            $image->storeAs($tujuan_upload, $filename);
            $project->update([
                'image' => $filename,
                'name' => $request->name,
                'url' => $request->url
            ]);
            $project->save;
        } else {
            unset($project['image']);
            $project->update($request->all());
        }

        return to_route('project.index')->with('success', 'project update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project = Project::find($project->id);
        if ($project->image) {
            \unlink("storage/project/" . $project->image);
        }
        // dd($icon);

        $project->delete();
        return \to_route('project.index')
            ->with('success_message', 'Your Action Success');
    }
}
