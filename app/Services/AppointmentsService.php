<?php

namespace App\Services;

use App\Models\HelpCentre;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

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

    /** 
    * Search for Help Centres based on a location string
    * @param string $location_str
    */
    public function searchFetchHelpCentres(string $location_str): Collection
    {
        return HelpCentre::where('address', 'like', '%'.$location_str.'%')->get();
    }

    public function searchFetchAppointments(string $appt_date): Collection
    {
        return Appointment::whereDate('day', Carbon::parse($appt_date))->get();
    }
}