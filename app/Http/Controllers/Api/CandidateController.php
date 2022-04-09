<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use App\Repositories\Contract\CandidateContract;

class CandidateController extends Controller
{
    protected CandidateContract $candidateRepository;

    public function __construct(CandidateContract $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;

        $this->middleware('permission:edit', ['only' => ['update']]);
        $this->middleware('permission:add', ['only' => ['store']]);
        $this->middleware('permission:delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = $this->candidateRepository->getAllCandidate();

        return CandidateResource::collection($candidates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CandidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request)
    {
        $this->candidateRepository->createCandidate($request->validated());

        return empty_object(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return new CandidateResource($this->candidateRepository->getCandidateById($candidate));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CandidateRequest  $request
     * @param  \App\Models\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, Candidate $candidate)
    {
        $this->candidateRepository->updateCandidate($candidate, $request->validated());

        return empty_object();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $this->candidateRepository->deleteCandidate($candidate);

        return empty_object();
    }
}
