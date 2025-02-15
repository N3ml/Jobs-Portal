<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = User::ofApplicants()->paginate();
        return view('admin.applicants.index', compact('applicants'));
    }

    public function destroy($id)
    {
        $applicant = User::findOrFail($id);
        $applicant->delete();
        return response()->json([
            'status' => 'success',
            'message' => __('messages.Applicant_deleted')
        ]);    }
}
