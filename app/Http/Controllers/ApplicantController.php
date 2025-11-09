<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    // @desc Store a new job application
    // @route /jobs/{job}
    public function store(Request $request, Job $job): RedirectResponse
    {
        // Get logged in user
        $user = Auth::user();

        // Check if user already applied
        $existingApplication = Applicant::where('job_id', $job->id)->where('user_id', $user->id)->exists();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this job');
        }

        // Validate incoming data
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'contact_phone' => 'nullable|string',
            'contact_email' => 'required|string|email',
            'message' => 'nullable|string',
            'location' => 'nullable|string',
            'resume' => 'required|file|mimes:pdf|max:2048'
        ]);

        // Handle resume upload
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validatedData['resume_path'] = $path;
        }

        // Store the application
        $application = new Applicant($validatedData);
        $application->job_id = $job->id;
        $application->user_id = $user->id;
        $application->save();

        return redirect()->back()->with('success', 'Your application was submitted successfully');
    }

    // @desc Delete job applicant
    // @route /applicants/{applicant}
    public function destroy($id): RedirectResponse
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->route('dashboard')->with('success', 'Applicant deleted successfully');
    }
}
