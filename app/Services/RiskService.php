<?php

namespace App\Services;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

class RiskService extends BaseService
{
    public function fetchAssessmentQuestions(): Collection
    {
        return Question::with('options')->get();
    }

    /** 
     * This method calculates the associated point total
     * for the passed in answers
     * and evaluates the risk factor.
     *  
     * It also updates the date of birth of the current user
     * @param array $answerData 
    */
    public function calcEvaluateRiskScore(array $answerData): int
    {
        /** Update user model with dob */
        $this->addDOBToUserModel($answerData['user_id'], $answerData['dob']);

        $score = 0;
        $answers = $answerData['answers'];
        
        foreach ($answers as $answer) {
            if (!is_array($answer)) {
                $score = $score + $this->evalPoint($answer);
            }else {
                foreach ($answer as $ans) {
                    $score = $score + $this->evalPoint($ans);
                }
            }
        }

        return $score;
    }

    private function evalPoint(string $answer): int
    {
        $option = Option::find($answer);
        if ($option) {
            return $option->point;
        }
        return 0;
    }
}