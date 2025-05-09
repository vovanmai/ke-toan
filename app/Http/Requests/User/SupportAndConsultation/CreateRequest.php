<?php

namespace App\Http\Requests\User\SupportAndConsultation;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
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
            'name' => 'required|max:50',
            'phone' => [
                'required',
                'max:11',
                'regex:/^0[1-9]{1}[0-9]{8,9}$/'
            ],
            'content' => 'required|max:1000',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }
}
