<?php

namespace App\Http\Controllers\Website;

use App\Enums\ApplicationStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class WebsiteApplicationController extends Controller
{
    public function applyForm(string $id)
    {
        $job = Job::with('position')->findOrFail($id);
        return view('website.apply-job', compact('job'));
    }

    public function apply(Request $request, string $id)
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

    public function myApplications()
    {
        $applications = Application::where('user_id', auth()->id())->with('job')->latest()->get();
        return view('website.my-applications', compact('applications'));
    }

    public function application($id)
    {
        $application = Application::findOrFail($id);
        return view('website.application', compact('application'));
    }

    public function cancelApplication(string $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return redirect()->route('website.my-applications')->with('success', __('messages.application_cancelled'));
    }
}
