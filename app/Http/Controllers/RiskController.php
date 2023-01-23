<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RiskService;
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
}
