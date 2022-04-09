<?php

namespace App\Repositories\Contract;

use App\Models\Candidate;

interface CandidateContract
{
    public function getAllCandidate();

    public function getCandidateById(Candidate $candidate);

    public function createCandidate(array $data);

    public function updateCandidate(Candidate $candidate, array $data);

    public function deleteCandidate(Candidate $candidate);
}
