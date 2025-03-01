<?php

namespace App\Http\Controllers\Website;

use App\Enums\ApplicationStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::where('user_id', auth()->id())->with('job')->latest()->get();
        return view('website.my-applications', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $job = Job::with('position')->findOrFail($id);
        return view('website.apply-job', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $job = Job::findOrFail($id);
        $resume = $request->resume;
        if ($request->hasFile('resume')) {
            $request->file('resume')->storeAs('resumes',auth()->user()->name.'_resume' . '.' . $request->file('resume')->extension(), 'public');
            $resume = 'resumes/' . auth()->user()->name.'_resume' . '.' . $request->file('resume')->extension();
        }

        Application::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'status' => ApplicationStatusEnum::PENDING->value,
            'phone' => $request->phone,
            'address' => $request->address,
            'resume' => $resume,
        ]);

        return redirect()->route('website.home')->with('success', __('messages.application_submitted'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = Application::findOrFail($id);
        return view('website.application', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return redirect()->route('website.my-applications')->with('success', __('messages.application_cancelled'));
    }
}
