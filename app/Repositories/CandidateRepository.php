<?php

namespace App\Repositories;

use App\Models\Candidate;
use App\Repositories\Contract\CandidateContract;

class CandidateRepository implements CandidateContract
{
    public function getAllCandidate() {
        return Candidate::latest()->paginate(10);
    }

    public function getCandidateById(Candidate $candidate) {
        return Candidate::findOrFail($candidate->id);
    }

    public function createCandidate(array $data)
    {
        $candidate = new Candidate($data);

        $candidate->save();

        return $candidate;
    }

    public function updateCandidate(Candidate $candidate, array $data)
    {
        $candidate->fill($data);

        $candidate->update();

        return $candidate;
    }

    public function deleteCandidate(Candidate $candidate) {
        Candidate::destroy($candidate->id);
    }
}
