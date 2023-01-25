<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RiskService;
use App\Http\Requests\AnswersRequest;
use Symfony\Component\HttpFoundation\Response;

class RiskController extends Controller
{
    /** 
     * GET: api/risk/questions
     * Fetch all the risk assessment questions
     *  
     * @param RiskService $service 
    */
    public function fetchQuestions(RiskService $service): Response
    {
        $questions = $service->fetchAssessmentQuestions();

        return response()->json(
            [
                'data'    => $questions,
                'success' => true
            ],
            200
        );
    }

    /** 
     * POST: api/risk/answers
     * Calculate the risk of HIV from the answers provided
     *  
     * @param AnswersRequest $request 
     * @param RiskService $service 
    */
    public function calculateRisk(AnswersRequest $request, RiskService $service): Response
    {
        $riskScore = $service->calcEvaluateRiskScore($request->all());

        return response()->json(
            [
                'data'    => $riskScore,
                'success' => true
            ],
            200
        );
    }
}
