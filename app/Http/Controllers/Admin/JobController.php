<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Position;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(8);
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::all();
        return view('admin.jobs.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Job::create($request->validate([
            'position_id' => 'required|exists:positions,id',
            'requirements' => 'required|string',
            'location' => 'required|string',
            'salary' => 'required|numeric',
            'type' => 'required|string',
            'status' => 'required|string',
        ],[
            'position_id.required' => 'The position field is required.',
        ]));
        return redirect()->route('admin.jobs.index')->with('success', __('messages.job_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $positions = Position::all();
        $job = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->validate([
            'position_id' => 'required|exists:positions,id',
            'requirements' => 'required|string',
            'location' => 'required|string',
            'salary' => 'required|numeric',
            'type' => 'required|string',
            'status' => 'required|string',
        ]));
        return redirect()->route('admin.jobs.index')->with('success', __('messages.job_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        if ($job->applications()->count()){
            return response()->json([
                'status' => 'error',
                'message' => __('messages.Job_cannot_delete')
            ]);
        }
        $job->delete();
        return response()->json([
            'status' => 'success',
            'message' => __('messages.Job_deleted')
        ]);
    }
}
