<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'help_centre_id' => 'required|string|exists:help_centres,id',
            'user_id'        => 'required|string|exists:users,id',
            'type'           => 'required|string',
            'day'            => 'required|string',
            'time'           => 'required|string',
            'dob'            => 'required',
            'gender_at_birth'=> 'required|string',
            'gender_today'   => 'required|string',
            'appt_for'       => 'required|string',
            'name'           => 'required|string',
            'phone'          => 'required|string',
            'location'       => 'required|string',
            'optout_sms'     => 'required|boolean',
            'avoid_calling'  => 'required|boolean',
            'covid_exposed'  => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'appt_for.required' => 'Kindly indicate who you are making this appointment for',
            'appt_for.string'   => 'Appointment for should be text',
            'user_id.string'    => 'The user token should be text',
            'user_id.required'  => 'No user token found in this request',
            'user_id.exists'    => 'This user does not exist on our database',
        ];
    }
}
