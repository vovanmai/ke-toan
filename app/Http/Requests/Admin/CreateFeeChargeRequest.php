<?php

namespace App\Http\Requests\Admin;

use App\Rules\CheckHtmlElement;
use App\Rules\PhoneNumber;
use App\Rules\UnitOf;
use Illuminate\Foundation\Http\FormRequest;

class CreateFeeChargeRequest extends FormRequest
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
            'tax' => 'nullable|integer|min:0|max:99',
            'ship_fee' => [
                'bail',
                'nullable',
                'integer',
                'min:0',
                'max:100000',
                new UnitOf()
            ],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
}
