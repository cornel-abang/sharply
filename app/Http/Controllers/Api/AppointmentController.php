<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AppointmentsService;
use App\Http\Requests\AppointmentRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\AppointmentUpdateRequest;
use App\Http\Requests\SearchHelpCentresRequest;

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
     * @param string $user_id 
     * @param AppointmentsService $service 
    */
    public function getAppointments(string $user_id, AppointmentsService $service): Response
    {  
        return response()->json(
            [
                'data'    => $service->fetchAppointments($user_id),
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

    /** 
     * POST: api/appointments/help-centres
     * Search and retrieve all Help Centres 
     * according a location string
     * 
     * @param string $user_id 
     * @param string $location_str 
     * @param AppointmentsService $service 
    */
    public function searchAndFetchHelpCentres(
        SearchHelpCentresRequest $request,
        AppointmentsService $service
    ): Response
    {
        return response()->json(
            [
                'data'    => $service->searchFetchHelpCentres($request->location_str),
                'success' => true
            ],
            200
        );
    }

    /** 
     * POST: api/appointments/{appt_date}
     * Fetch all appointments for the given 
     * date
     * 
     * @param string $appt_date 
     * @param AppointmentsService $service 
    */
    public function fetchAppointments(
        string $appt_date,
        AppointmentsService $service
    ): Response
    {
        return response()->json(
            [
                'data'    => $service->searchFetchAppointments($appt_date),
                'success' => true
            ],
            200
        );
    }

}
