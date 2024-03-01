<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $candidateData = Candidate::latest()->paginate(5);
        return new CandidateResource(true, "Daftar Pelamar", $candidateData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'job_id' => 'required',
            'email' => 'required|unique:candidates,email',
            'phone' => 'required|numeric|unique:candidates,phone',
            'year' => 'required',
            'skill_id' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $candidateData = new Candidate;
        $candidateData->id = $request->id;
        $candidateData->name = $request->name;
        $candidateData->job_id = $request->job_id;
        $candidateData->email = $request->email;
        $candidateData->phone = $request->phone;
        $candidateData->year = intval($request->year);
        $candidateData->save();

        $candidateData->skillSets()->sync($request->skill_id);

        return new CandidateResource(true, 'Data Pelamar Berhasil Ditambahkan!', $candidateData);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $candidateData = Candidate::find($id);
        return new CandidateResource(true, 'Detail Data Pelamar', $candidateData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'job_id' => 'required',
            'email' => 'required|unique:candidates,email',
            'phone' => 'required|numeric|unique:candidates,phone',
            'year' => 'required',
            'skill_id' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $candidateData = Candidate::find($id);
        $candidateData->name = $request->name;
        $candidateData->job_id = $request->job_id;
        $candidateData->email = $request->email;
        $candidateData->phone = $request->phone;
        $candidateData->year = intval($request->year);
        $candidateData->update();

        $candidateData->skillSets()->sync($request->skill_id);

        return new CandidateResource(true, 'Data Pelamar Berhasil Diperbarui!', $candidateData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $candidateData = Candidate::find($id);
        $candidateData->delete();
        return new CandidateResource(true, 'Data Pelamar Telah Dihapus!', null);
    }
}
