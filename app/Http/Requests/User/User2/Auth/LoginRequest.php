<?php

namespace App\Http\Requests\User\User2\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'login_email' => 'required|email|max:255',
            'login_password' => 'required|max:20',
            'remember_me' => 'nullable',
        ];
    }
}
