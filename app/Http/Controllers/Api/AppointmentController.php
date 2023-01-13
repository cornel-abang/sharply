<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AppointmentsService;
use App\Http\Requests\AppointmentRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\AppointmentUpdateRequest;

class AppointmentController extends Controller
{
    /** 
     * POST: api/appointments
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
        $appointment = $service->create($request->validated());

        return response()->json(
            [
                'data'    => $appointment,
                'success' => true
            ],
            200
        );
    }

    /** 
     * GET: api/appointments/{user_id}
     * Retrieve all appointments for a user
     * 
     * @param string $cookie_id 
     * @param AppointmentsService $service 
    */
    public function getAppointments(string $user_id, AppointmentsService $service): Response
    {  
        return response()->json(
            [
                'data'    => $service->fetchAppointments($cookie_id),
                'success' => true
            ],
            200
        );
    }

    /** 
     * PUT: api/appointments/{appointment_id}
     * Create any type of appointment for a user
     * 
     * @param AppointmentRequest $request 
     * @param AppointmentsService $service 
    */
    public function updateAppointment(
        AppointmentUpdateRequest $request, 
        string $appointment_id,
        AppointmentsService $service
    ): Response {
        $updated = $service->updateAppointment($request->validated(), $appointment_id);

        return response()->json(
            [
                'data'    => $updated,
                'success' => true
            ]
            ,200
        );
    }

}
