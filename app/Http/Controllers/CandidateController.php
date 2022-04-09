<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\Candidate;
use App\Repositories\Contract\CandidateContract;

class CandidateController extends Controller
{
    protected CandidateContract $candidateRepository;

    public function __construct(CandidateContract $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;

        $this->middleware('permission:view', ['only' => ['index']]);
        $this->middleware('permission:read', ['only' => ['show']]);
        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:add', ['only' => ['create', 'store']]);
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

        return view('pages.candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidate = new Candidate();

        return view('pages.candidate.form', compact('candidate'));
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

        return redirect()->to(route('candidates.index'))
                    ->with('candidate', 'Data is successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        $candidate = $this->candidateRepository->getCandidateById($candidate);

        return view('pages.candidate.form', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        return view('pages.candidate.form', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CandidateRequest  $request
     * @param  Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, Candidate $candidate)
    {
         $this->candidateRepository->updateCandidate($candidate, $request->validated());

        return redirect()->to(route('candidates.index'))
                    ->with('candidate', 'Data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $this->candidateRepository->deleteCandidate($candidate);

        return redirect()->to(route('candidates.index'))
                    ->with('candidate', 'Data is successfully deleted!');
    }
}
