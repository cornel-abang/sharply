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
}