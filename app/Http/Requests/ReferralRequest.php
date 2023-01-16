<?php

namespace App\Http\Requests;

class ReferralRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'   => 'required|string|exists:users,id',
            'who'       => 'required|string',
            'contact'   => 'required|string',
            'sex'       => 'required|in:Male,Female,Unknown',
            'service'   => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'sex.in' => 'The sex must be either Male, Female or Unknown'
        ];
    }
}
