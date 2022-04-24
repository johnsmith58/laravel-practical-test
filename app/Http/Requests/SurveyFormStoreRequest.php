<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class SurveyFormStoreRequest extends FormRequest
{
    use FailedValidation;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:surveys,email',
            'phone_number' => 'required|numeric|digits_between:6,11',
            'dob' => 'required|date|before:today|date_format:Y-m-d',
            'gender' => 'required|string|in:male,female,other',
            'remark' => 'required|string'
        ];
    }
}
