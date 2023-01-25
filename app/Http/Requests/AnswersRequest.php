<?php

namespace App\Http\Requests;

class AnswersRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "dob" => "required|string",
            "answers" => "required|array|min:13"
        ];
    }

    public function messages(): array
    {
        return [
            'dob.required' => 'Please provide your date of birth',
            'dob.string'   => 'The date of birth should be text',
        ];
    }
}