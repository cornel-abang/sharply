<?php

namespace App\Services;

use App\Models\Appointment;

class AppointmentsService extends BaseService
{
    /** 
    * Create an appointment of any type  
    * @param array $data
    */
    public function create(array $data): ?Appointment
    {
        return Appointment::create($data);
    }

    /** 
    * Fetch all appointments for a particular user session
    * @param array $data
    */
    public function fetchAppointments(string $id): array
    {
        $user = $this->resolveUser($id);

        return [
            'user'         => $user->withoutRelations(),
            'appointments' => $user->appointments
        ];
    }

    /** 
    * Update a single apppointment
    * @param array $data
    * @param string $id
    */
    public function updateAppointment( array $data, string $id): ?Appointment
    {
        $this->getAppointment($id)->update($data);
        
        return $this->getAppointment($id);
    }

    /** 
    * Fetch a single appointment for a particular user session
    * @param string $id
    */
    public function getAppointment(string $id): ?Appointment
    {
        return Appointment::findOrFail($id);
    }
}