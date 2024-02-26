<?php

namespace App\Http\Requests\Admin\Admin;

use App\Services\Admin\CommonService;
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
        $roles = array_keys(resolve(CommonService::class)->getRoles());

        return [
            'name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:admins',
            'password' => 'required|min:6|max:12',
            'password_confirmation' => 'required|same:password',
            'avatar' => 'nullable',
            'role' => 'required|in:' . implode(',', $roles),
        ];
    }
}
