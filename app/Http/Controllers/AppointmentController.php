<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Services\AppointmentsService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    /** 
     * Create any type of appointment for a user
     * 
     * @param AppointmentRequest $request 
     * @param AppointmentsService $service 
     */
    public function scheduleAppointment(
        AppointmentRequest $request, 
        AppointmentsService $service
    ): Response
    {
        $data = array_merge(['user_id' => $request->cookie_id], $request->validated());
        $appointment = $service->create($data);

        return response()->json(
            $appointment,
            200
        );
    }
}
