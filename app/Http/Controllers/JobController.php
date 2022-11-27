<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return \view('layouts.admin.job', [
            'jobs' => Job::all()
        ]);
    }

    public function store(Request $request)
    {
        // \dd($request);
        $request->validate(
            [
                'company_name' => 'required|max:45',
                'role' => 'required|max:45',
                'start_at' => 'required',
                'end_at' => 'required',
                'image' => 'required',
                'desc' => 'required'
            ],
            [
                'company_name.required' => 'The experience name field is required',
                'start_at.required' => 'The experience date start field is required',
                'end_at.required' => 'The experience date end field is required',
                'image.required' => 'The experience image field is required',
            ]
        );
        $start_at = Carbon::createFromFormat('m/d/Y', $request->start_at)
            ->format('Y-m-d');
        $end_at = Carbon::createFromFormat('m/d/Y', $request->end_at)
            ->format('Y-m-d');


        $validatedData = $request->only([
            'company_name', 'desc', 'role'
        ]);

        $image = $request->file('image');
        $filename = "job_" . uniqid() . "." . $image->getClientOriginalExtension();
        $stored = 'public/job';
        $image->storeAs($stored, $filename);

        $validatedData['image'] = $filename;
        $validatedData['start_at'] = $start_at;
        $validatedData['end_at'] = $end_at;

        Job::create($validatedData);

        return to_route('exp.index')->with('Create Experience Success');
    }

    public function edit($id)
    {
        return \view('layouts.admin.job.edit',[
            'job' => Job::find($id),
        ]);
    }

    public function show($id)
    {
        return \view('layouts.admin.job.edit',[
            'job' => Job::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        $request->validate(
            [
                'company_name' => 'required|max:45',
                'desc' => 'required|max:500',
                'start_at' => 'required',
                'end_at' => 'required',
                'role' => 'required',
            ],
            [
                'company_name.required' => 'The job name field is required',
                'desc.required' => 'The job description field is required',]
            );
            
            // \dd($id);
        $start_at = Carbon::createFromFormat('m/d/Y', $request->start_at)
        ->format('Y-m-d');
    $end_at = Carbon::createFromFormat('m/d/Y', $request->end_at)
        ->format('Y-m-d');

        if($request->file('image')) {
            if ($job->image) {
                unlink("storage/job/" . $job->image);
            }
            $image = $request->file('image');
            $filename = "job_" . uniqid() . "." . $image->getClientOriginalExtension();
            $tujuan_upload = 'public/job';
            $image->storeAs($tujuan_upload, $filename);
            $job->update([
                'image' => $filename,
                'company_name' => $request->company_name,
                'desc' => $request->desc,
                'start_at' => $start_at,
                'end_at' => $end_at,
                'role' => $request->role,
            ]);
            $job->save;
        }else {
            unset($job['image']);
            $job->update([
                'company_name' => $request->company_name,
                'desc' => $request->desc,
                'start_at' => $start_at,
                'end_at' => $end_at,
                'role' => $request->role,
            ]);
        }

        return to_route('exp.index')->with('success', 'Job update successfully');
    }


    public function destroy($id)
    {
        // \dd($id);
        $job = Job::find($id);
        if ($job->image) {
            \unlink("storage/job/" . $job->image);
        }
        // dd($icon);

        $job->delete();
        return \to_route('exp.index')
            ->with('success_message', 'Your Action Success');
    }
}
