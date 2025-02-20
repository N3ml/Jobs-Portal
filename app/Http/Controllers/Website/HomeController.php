<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $jobs = Job::with('position')->latest()->simplePaginate(6);
        return view('website.home', compact('jobs'));
    }
}
