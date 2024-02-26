<?php

namespace App\Http\Requests\User\User1\Auth;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required|max:30',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => [
                'required',
                new PhoneNumber(),
            ],
            'password' => 'required|min:6|max:20',
            'password_confirmation' => 'required|min:6|max:20|same:password',
        ];
    }
}
