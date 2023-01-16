<?php

namespace App\Http\Requests;


class SearchHelpCentresRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'       => 'required|string|exists:users,id',
            'location_str'  => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'location_str.required, 
            location_str.string' => 'The location string is invalid'
        ];
    }
}
