<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\AppointmentUpdateRequest;
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
    ): Response {
        $data = array_merge(['user_id' => $request->cookie_id], $request->validated());
        $appointment = $service->create($data);

        return response()->json(
            [
                'data'    => $appointment,
                'success' => true
            ],
            200
        );
    }

    /** 
     * Retrieve all appointments for a user
     * 
     * @param string $cookie_id 
     * @param AppointmentsService $service 
    */
    public function getAppointments(string $cookie_id, AppointmentsService $service): Response
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
