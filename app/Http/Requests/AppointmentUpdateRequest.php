<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'help_centre_id' => 'sometimes|string|exists:help_centres,id',
            'cookie_id'      => 'sometimes|string|exists:users,id',
            'type'           => 'sometimes|string',
            'day'            => 'sometimes|string',
            'time'           => 'sometimes|string',
            'dob'            => 'sometimes',
            'gender_at_birth'=> 'sometimes|string',
            'gender_today'   => 'sometimes|string',
            'appt_for'       => 'sometimes|string',
            'name'           => 'sometimes|string',
            'phone'          => 'sometimes|string',
            'location'       => 'sometimes|string',
        ];
    }

    public function messages()
    {
        return [
            'appt_for.string'     => 'Appointment for should be text',
            'cookie_id.string'    => 'The user token should be text',
            'cookie_id.exists'    => 'This user does not exist on our database',
        ];
    }
}
