<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Job;
use App\Models\Skill;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $skillData = Skill::all();
        $jobData = Job::all();
        return view("candidate.apply", compact("skillData", "jobData"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'job_id' => 'required',
            'email' => 'required|unique:candidates,email',
            'phone' => 'required|numeric|unique:candidates,phone',
            'year' => 'required',
            'skill_id' => 'required|array'
        ]);

        $candidateData = new Candidate;
        $candidateData->id = $request->id;
        $candidateData->name = $request->name;
        $candidateData->job_id = $request->job_id;
        $candidateData->email = $request->email;
        $candidateData->phone = $request->phone;
        $candidateData->year = intval($request->year);
        $candidateData->save();

        $candidateData->skillSets()->sync($request->skill_id);

        return redirect()->route('candidates.index')->with('success', 'successfully');
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
        //
    }
}
