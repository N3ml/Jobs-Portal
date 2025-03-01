<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{
    public function jobDetails(string $id)
    {
        $job = Job::with('position')->findOrFail($id);
        return view('website.job-details', compact('job'));
    }

}
