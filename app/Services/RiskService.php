<?php

namespace App\Services;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

class RiskService extends BaseService
{
    public function fetchAssessmentQuestions(): Collection
    {
        return Question::with('options')->get();
    }
}