<?php

namespace App\Http\Controllers;

use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Job;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PgSql\Lob;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // we use our Authorization Gate as middleware in the routes file

        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //we use our Authorization Gate as middleware in the routes file        

        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        $job = job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        //Use the Mail facade to send emails.
        // laravel smart enough to get the user email from the user no need to specify it
        // Mail::to($job->employer->user)->send(new JobPosted($job));

        // you can use queue to send email in the background
        Mail::to($job->employer->user)->queue(new JobPosted($job));

        //dispatch(new TranslateJob($job));

        return redirect('/jobs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //we use our Authorization Gate as middleware in the routes file        


        //authorize using the gate 
        //the auzorize method will run the logic associated with the gate, 
        //and if it fails laravel automatically abort 403 error
        //Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Job $job)
    {
        //we use our Authorization Gate as middleware in the routes file        

        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        //update the job
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        //redirect to the job page
        return redirect('/jobs/' . $job->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //we use our Authorization Gate as middleware in the routes file        

        //delete the job
        $job->delete();

        //redirect to the jobs page
        return redirect('/jobs');
    }
}
